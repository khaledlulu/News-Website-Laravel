<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('user')->orderBy('id', 'asc')->Paginate(7);
        return response()->view('cms.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.author.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            // 'image' => "required|image|max:2048|mimes:png,jpg,jpeg,pdf",
            // 'file' => "required|file|max:2048|mimes:png,jpg,jpeg,pdf",
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
        ], []);

        if (!$validator->fails()) {

            $authors = new Author();
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));
            if (request()->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . 'file.' . $file->getClientOriginalExtension();
                $file->move('storage/files/authors', $fileName);
                $authors->file = $fileName;
            }

            $isSaved = $authors->save();




            if ($isSaved) {
                $users = new User();
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/authors', $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get(' mobile');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->birth_date = $request->get('birth_date');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);
                $isSaved = $users->save();
                return response()->json(['icon' => 'success', 'title' => 'Crated is successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Crated is falid'], 400);
            }
        } else {
            return response()->json([
                'icon' => 'error', 'title' => $validator->getMessageBag()->first()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $authors = Author::with('user')->findOrFail($id);
        return response()->view('cms.author.edit', compact('countries', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            // 'image' => "required|image|max:2048|mimes:png,jpg,jpeg,pdf",
            // 'file' => "required|file|max:2048|mimes:png,jpg,jpeg,pdf",
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
        ], []);

        if (!$validator->fails()) {

            $authors = Author::findOrFail($id);
            $authors->email = $request->get('email');
            // $admins->password = Hash::make($request->get('password'));
            if (request()->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . 'file.' . $file->getClientOriginalExtension();
                $file->move('storage/files/authors', $fileName);
                $authors->image = $fileName;
            }
            $isSaved = $authors->save();




            if ($isSaved) {
                $users = $authors->user;
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/authors', $imageName);
                    $authors->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get(' mobile');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->birth_date = $request->get('birth_date');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);
                $isSaved = $users->save();
                return ['redirect' => route('authors.index')];

                return response()->json(['icon' => 'success', 'title' => 'Update is successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Update is falid'], 400);
            }
        } else {
            return response()->json([
                'icon' => 'error', 'title' => $validator->getMessageBag()->first()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Author::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is successfully'], 200);
    }
}

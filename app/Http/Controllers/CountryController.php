<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $countries=Country::w
        $countries = Country::withCount('citeies')->orderBy('id', 'asc')->Paginate(5);
        return response()->view('cms.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|min:3|max:20',
            'code' => 'required|string|min:3|max:202',
        ]);
        $countries = new Country;
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isSaved = $countries->save();


        session()->flash('message', $isSaved ? 'crated is succssefully' : 'created is failed');
        // return redirect()->back();
        return redirect(route('countries.index'));
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
        // $countries = new Country::find($id);
        $countries = Country::findOrFail($id);

        return response()->view('cms.country.edit', compact('countries'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { {
            $request->validate([
                'country_name' => 'required|string|min:3|max:20',
                'code' => 'required|string|min:3|max:20',
            ]);
            $countries = Country::findOrFail($id);
            $countries->country_name = $request->get('country_name');
            $countries->code = $request->get('code');

            $isUpdate = $countries->save();


            session()->flash('message', $isUpdate ? 'crated is succssefully' : 'created is failed');
            // return redirect()->back();
            return redirect(route('countries.index'));
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
        $countries = Country::destroy($id);
        // echo $countries ? 'Delete is successfully' : 'Delete is faild ';
        return redirect(route('countries.index'));
    }
}

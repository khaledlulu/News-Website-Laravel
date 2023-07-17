<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'asc')->Paginate(10);
        return response()->view('cms.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), []);

        if (!$validator->fails()) {
            $sliders = new Slider();

            if (request()->hasFile('image')) {
                $image = $request->file('image');;
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->image = $imageName;
            }
            if (request()->hasFile('video')) {
                $video = $request->file('video');;
                $videoName = time() . 'video.' . $video->getClientOriginalExtension();
                $video->move('storage/videos/slider', $videoName);
                $sliders->video = $videoName;
            }
            $sliders->title = $request->get('title');
            $sliders->short_description = $request->get('short_description');
            $isSaved = $sliders->save();
            return response()->json(['icon' => 'success', 'title' => 'Saved is Successfully'],  200);
        } else {
            return response()->json(['icon' => 'error', 'message' => $validator->getMessageBag()->first()], 400);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.sliders.edit', compact('sliders'));
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
        $validator = Validator($request->all(), []);

        if (!$validator->fails()) {
            $sliders = Slider::findOrFail($id);

            if (request()->hasFile('image')) {
                $image = $request->file('image');;
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->image = $imageName;
            }

            if (request()->hasFile('video')) {
                $video = $request->file('video');;
                $videoName = time() . 'video.' . $video->getClientOriginalExtension();
                $video->move('storage/videos/slider', $videoName);
                $sliders->video = $videoName;
            }

            $sliders->title = $request->get('title');
            $sliders->short_description = $request->get('short_description');

            $isSaved = $sliders->save();
            return ['redirect' => route('sliders.index')];
            return response()->json(['message' => $isSaved ? "Update is Successfully" : "Update is Fieald"], $isSaved ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
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
        $sliders = Slider::destroy($id);
        return response()->json(['message' => $sliders ? "Deleted Successfully" : "Deleted Fieald"], $sliders ? 200 : 400);
    }
}

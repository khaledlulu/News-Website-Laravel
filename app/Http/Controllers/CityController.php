<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('country')->orderBy('id', 'asc')->Paginate(10);
        return response()->view('cms.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create', compact('countries'));
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
            'city_name' => 'required|String|min:3|max:20',
            'street' => 'required|String|min:3|max:20',
        ], []);

        if (!$validator->fails()) {
            $cities = new City();
            $cities->city_name = $request->get('city_name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');

            $isSaved = $cities->save();

            return ['redirect' => route('cities.index')];

            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'created is successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'created is falid'], 400);
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
        $cities = City::FindOrFail($id);

        return response()->view('cms.city.edit', compact('countries', 'cities'));
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
            'city_name' => 'required|String|min:3|max:20',
            'street' => 'required|String|min:3|max:20',
        ], []);

        if (!$validator->fails()) {

            $cities = City::FindOrFail($id);
            $cities->city_name = $request->get('city_name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');

            $isUpdate = $cities->save();

            return ['redirect' => route('cities.index')];

            if ($isUpdate) {
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
        $cities = City::destroy($id);
        return response()->json(['icon' => 'success', 'tittel' => 'Delete is Successfully'], 200);
    }
}

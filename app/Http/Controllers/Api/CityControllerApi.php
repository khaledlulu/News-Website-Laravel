<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id', 'asc')->get();
        //  وليس واجهات عرض api عشان انا هان بتعامل مع  json كتبت  viwe هنا بدل
        return response()->json([
            'status' => true,
            'messege' => 'data of successfully',
            'data' => $cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), []);
        if (!$validator->fails()) {
            $cities = new City();
            $cities->city_name = $request->get('city_name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');
            $isSaved = $cities->save();
            if ($isSaved) {
                return response()->json([
                    'status' => true,
                    'message' => 'created is successfully',
                    'data' => 200
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
                'data' => 400
            ]);
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
        $cities = City::FindOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Show Data is successfully',
            'data' => $cities
        ]);
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
        $validator = validator($request->all(), []);
        if (!$validator->fails()) {
            $cities = City::FindOrFail($id);
            $cities->city_name = $request->get('city_name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');
            $isUpdate = $cities->save();
            if ($isUpdate) {
                return response()->json([
                    'status' => true,
                    'message' => 'Update is successfully',
                    'data' => 200
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
                'data' => 400
            ]);
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
        return response()->json([
            'status' => true,
            'message' => 'Delete is successfully',
            'data' => 200
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Requests;

class LocateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::all();
//        return view('blog.index', ['blog' => $blog]);
////        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
        return response()->json(['data' => $location]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location();
        $location->location_id = $request->location_id;
        $location->detail= $request->detail;
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->save();
////        return redirect('../public/blog');
//        return response()->json(['status' => 'sukses']);
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
        $location = Location::where('location_id', $id)->first();
        return response()->json(['data' => $location]);
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


        Location::where('location_id', $id)->update(['detail' => $request->detail, 'lat' => $request->lat, 'lng' => $request->lng]);
//        $location = Location::find($id);
//        $location->detail= $request->detail;
//        $location->lat = $request->lat;
//        $location->lng = $request->lng;
//        $location->save();
        return "Hello World ".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::where('location_id', $id);
        $location->delete();
//        return "Hello World ".$id;
    }


}

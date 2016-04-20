<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholarship_Variable;
use App\Http\Requests;

class ScholarshipVariableController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
//        echo url();
//        return "Home Controller";
        return view('scholarship');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sv = new Scholarship_Variable();
        $sv->scholarship_variable_id = $request->scholarship_variable_id;
        $sv->label = $request->label;
        $sv->total = $request->total;
        $sv->scholarship_id = $request->scholarship_id;
        $sv->save();
//        return "Hello World ".$sv->scholarship_variable_id." ".$sv->label." ".$sv->total." ".$sv->scholarship_id;
//        return $sv->scholarship_variable_id." ".$sv->label." ".$sv->total." ".$sv->scholarship_id;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id){
        return view('scholarship-detail');
    }
}

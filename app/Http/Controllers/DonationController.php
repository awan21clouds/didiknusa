<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\Http\Requests;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donation = new Donation();
        return response()->json(['data' => $donation->getAllRows()]);
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
        $donation = new Donation();
        $donation->donation_id = $request->donation_id;
        $donation->total = $request->total;
        $donation->random = $request->random;
        $donation->scholarship_id = $request->scholarship_id;
        $donation->transaction_id = $request->transaction_id;
        $donation->save();
        return response()->json(['status' => 'sukses']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = new Donation();
        return response()->json(['data' => $donation->getAllRowsByUser($id)]);
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
        Member::where('member_id', $id)->update(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'biography' => $request->biography,
                'location_id' => $request->location_id
            ]
        );
//        return "Hello World!";
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
        return view('donation-detail');
    }
}

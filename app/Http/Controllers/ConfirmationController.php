<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Confirmation;
use App\Http\Requests;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $confirmation = new Confirmation();
        $confirmation->confirmation_id = $request->confirmation_id;
        $confirmation->name = $request->name;
        $confirmation->account = $request->account;
        $confirmation->total = $request->total;
        $confirmation->payment_date = $request->payment_date;
        $confirmation->created = $request->created;
        $confirmation->bank = $request->bank;
        $confirmation->bank_id = $request->bank_id;
        $confirmation->transaction_id = $request->transaction_id;
        $confirmation->note = $request->note;
        $confirmation->save();
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = new Transaction();
        return response()->json(['data' => $transaction->getAllRows()]);
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
        $transaction = new Transaction();
        $transaction->transaction_id = $request->transaction_id;
        $transaction->created = $request->created;
        $transaction->transaction_detail_id = $request->transaction_detail_id;
        $transaction->transaction_status_id = $request->transaction_status_id;
        $transaction->member_id = $request->member_id;
        $transaction->save();
//        echo $request->transaction_id;
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
        $transaction = new Transaction();
        return response()->json(['data' => $transaction->getAllRows()]);
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
        print_r($id);
        $transaction = Transaction::where('transaction_id', $id);
        $transaction->delete();
    }

    public function remove($id)
    {
        echo $id;
        $transaction = Transaction::where('transaction_id', $id);
        $transaction->delete();
    }

    public function confirm(Request $request, $id){
        Transaction::where('transaction_id', $id)->update(
            [
                'transaction_status_id' => $request->transaction_status_id
            ]
        );
    }
}

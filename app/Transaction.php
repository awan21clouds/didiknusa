<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    public $timestamps = false;

    public function getAllRows(){
        $transaction = DB::table('transaction')
            ->join('donation', 'donation.transaction_id', '=', 'transaction.transaction_id')
            ->join('transaction_detail', 'transaction_detail.transaction_detail_id', '=', 'transaction.transaction_detail_id')
            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
//            ->select('donation.*', 'transaction.*', 'transaction_detail', 'transaction_status.*')
            ->select('transaction_detail.detail as transaction_detail', 'donation.*', 'transaction.*', 'transaction_status.detail as transaction_status')
            ->where('transaction.transaction_detail_id', '=', '0')
            ->orderBy('transaction.created', 'desc')
            ->get();
        return $transaction;
    }

    public function getDataByUser($id, $transaction_detail_id){
        $transaction = DB::table('transaction')
            ->join('donation', 'donation.transaction_id', '=', 'transaction.transaction_id')
            ->join('transaction_detail', 'transaction_detail.transaction_detail_id', '=', 'transaction.transaction_detail_id')
            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
            ->select('transaction_detail.detail as transaction_detail', 'donation.*', 'transaction.*', 'transaction_status.detail as transaction_status')
            ->where('transaction.transaction_detail_id', '=', $transaction_detail_id)
            ->where('transaction.member_id', '=', $id)
            ->orderBy('transaction.created', 'desc')
            ->get();
        return $transaction;
    }

    public function remove($id){
        DB::table('transaction')->where('transaction_id', '=', $id)->delete();
    }
}

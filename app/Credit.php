<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credit';
    public $timestamps = false;

    public function getAllRowsByUser($id){
//        $transaction = DB::table('credit')
//            ->join('transaction', 'credit.transaction_id', '=', 'transaction.transaction_id')
//            ->join('transaction_detail', 'transaction_detail.transaction_detail_id', '=', 'transaction.transaction_detail_id')
//            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
//            ->select('transaction_detail.detail as transaction_detail', 'transaction_status.detail as transaction_status', 'credit.*', 'transaction.*',DB::raw('DATE_FORMAT(DATE(transaction.created), "%d-%m-%Y") AS transaction_created'))
//            ->where('transaction.transaction_detail_id', '=', '1')
//            ->where('transaction.member_id', '=', $id)
//            ->orderBy('transaction.created', 'desc')
//            ->get();
        $transaction = DB::table('credit')
            ->join('transaction', 'credit.transaction_id', '=', 'transaction.transaction_id')
            ->select('credit.*')
            ->where('transaction.member_id', '=', $id)
            ->orderBy('transaction.created', 'desc')
            ->get();
        return $transaction;
    }

}

<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donation';
    public $timestamps = false;

    public function getAllRowsByUser($id){
        $transaction = DB::table('donation')
            ->join('scholarship', 'donation.scholarship_id', '=', 'scholarship.scholarship_id')
            ->join('transaction', 'donation.transaction_id', '=', 'transaction.transaction_id')
            ->join('transaction_detail', 'transaction_detail.transaction_detail_id', '=', 'transaction.transaction_detail_id')
            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
            ->select('transaction_detail.detail as transaction_detail', 'donation.*', 'transaction.*', 'transaction_status.detail as transaction_status', 'scholarship.*')
            ->where('transaction.transaction_detail_id', '=', '0')
            ->where('transaction.member_id', '=', $id)
            ->orderBy('transaction.created', 'desc')
            ->get();
        return $transaction;
    }

    public function getAllRows(){

        $transaction = DB::table('donation')
            ->join('transaction', 'donation.transaction_id', '=', 'transaction.transaction_id')
            ->join('scholarship', 'donation.scholarship_id', '=', 'scholarship.scholarship_id')
            ->join('transaction_detail', 'transaction_detail.transaction_detail_id', '=', 'transaction.transaction_detail_id')
            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
            ->select('transaction.member_id as transaction_member_id ', 'transaction_detail.detail as transaction_detail', 'donation.*', 'transaction.*', 'transaction_status.detail as transaction_status', 'scholarship.*')
            ->where('transaction.transaction_detail_id', '=', '0')
            ->where('transaction.transaction_status_id', '=', '1')
            ->orderBy('transaction.created', 'desc')
            ->get();

//        $transaction = DB::table('donation')
//            ->join('scholarship', 'donation.scholarship_id', '=', 'scholarship.scholarship_id')
//            ->join('transaction', 'donation.transaction_id', '=', 'transaction.transaction_id')
//            ->join('transaction_detail', 'transaction_detail.transaction_detail_id', '=', 'transaction.transaction_detail_id')
//            ->join('transaction_status', 'transaction_status.transaction_status_id', '=', 'transaction.transaction_status_id')
//            ->select('transaction_detail.detail as transaction_detail', 'donation.*', 'transaction.*', 'transaction_status.detail as transaction_status', 'scholarship.*')
//            ->where('transaction.transaction_detail_id', '=', '0')
//            ->where('transaction.transaction_status_id', '=', '1')
//            ->orderBy('transaction.created', 'desc')
//            ->get();
        return $transaction;
    }
}

<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    public $timestamps = false;

    public function getRowsByUser($i){
        $member = DB::table('member')
            ->select(DB::raw('ifnull((select count(scholarship_id) from scholarship where scholarship.member_id = member.member_id),0) as scholarship_count'), DB::raw('ifnull((select count(donation_id) from donation join transaction on transaction.transaction_id = donation.transaction_id where transaction.member_id = member.member_id) ,0) donation_count'), DB::raw('ifnull((select sum(total) from credit join transaction on transaction.transaction_id = credit.transaction_id where transaction.member_id = member.member_id),0) as credit_count'))
            ->groupBy('member.member_id')
            ->where('member.member_id', '=', $i)
            ->first();
        return $member;
    }

    public function login($email, $password){
        $member = DB::table('member')
//            ->select('*', DB::raw('(DATE_FORMAT(member.regiter_date, "%T %d-%m-%Y")) as member_register_date'))
            ->select('*', '(DATE_FORMAT(register_date, "%d-%m-%Y")) as member_register_date')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();
        return $member;
    }
}

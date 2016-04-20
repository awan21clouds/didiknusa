<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    public $timestamps = false;

    public function getRowsByUser($i){
        $scholarship = DB::table('member')
//            ->select(DB::raw('(IFNULL((select count(scholarship.scholarhip_id) from scholarhip where scholarship.member_id = member.member_id), 0)) as scholarship_count'), DB::raw('(IFNULL((select count(donation.donation_id) from donation join scholarship on donation.scholarship_id = scholarship.scholarship_id where scholarship.member_id = member.member_id), 0)) as donation_count'), DB::raw('(IFNULL((select sum(credit.total) from credit join transaction on credit.transaction_id = transaction.transaction_id where transaction.member_id = member.member_id), 0)) as credit_count'))
            ->select(DB::raw('(IFNULL((select count(scholarship.scholarship_id) from scholarship where scholarship.member_id = member.member_id), 0)) as scholarship_count'), DB::raw('(IFNULL((select count(donation.donation_id) from donation join scholarship on donation.scholarship_id = scholarship.scholarship_id where scholarship.member_id = member.member_id), 0)) as donation_count'), DB::raw('(IFNULL((select sum(credit.total) from credit join transaction on credit.transaction_id = transaction.transaction_id where transaction.member_id = member.member_id), 0)) as credit_count'))
            ->where('member.member_id', '=', $i)
            ->orderBy(DB::raw('RAND()'))
            ->first();
        return $scholarship;
    }
}

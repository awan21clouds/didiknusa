<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $table = 'scholarship';
    public $timestamps = false;
    public function getRow($i){
        $scholarship = DB::table('scholarship')
            ->join('member', 'scholarship.member_id', '=', 'member.member_id')
            ->select('scholarship.*', 'member.*', DB::raw('(DATE_FORMAT(register_date, "%H:%i %d-%m-%Y")) as scholarship_created'), DB::raw('(SELECT sum(total) FROM scholarship_variable where scholarship_variable.scholarship_id = scholarship.scholarship_id) as scholarship_target'), DB::raw('(IFNULL((select sum(total) from donation join transaction on donation.transaction_id = transaction.transaction_id where donation.scholarship_id = scholarship.scholarship_id and transaction.transaction_status_id = 2), 0)) as donation_total'))
            ->orderBy(DB::raw('RAND()'))
            ->take($i)
            ->get();
        return $scholarship;
    }

    public function getRowsByUser($i){
        $scholarship = DB::table('scholarship')
            ->join('member', 'scholarship.member_id', '=', 'member.member_id')
            ->select('scholarship.*', 'member.*', DB::raw('(DATE_FORMAT(register_date, "%H:%i %d-%m-%Y")) as scholarship_created'), DB::raw('(SELECT sum(total) FROM scholarship_variable where scholarship_variable.scholarship_id = scholarship.scholarship_id) as scholarship_target'), DB::raw('(IFNULL((select sum(total) from donation join transaction on donation.transaction_id = transaction.transaction_id where donation.scholarship_id = scholarship.scholarship_id and transaction.transaction_status_id = 2), 0)) as donation_total'))
            ->where('member.member_id', '=', $i)
            ->orderBy(DB::raw('RAND()'))
            ->get();
        return $scholarship;
    }

    public function getRowsByScholarship($i){
        $scholarship = DB::table('scholarship')
            ->join('member', 'scholarship.member_id', '=', 'member.member_id')
            ->join('location', 'location.location_id', '=', 'scholarship.location_id')
            ->select('scholarship.*', 'location.*', DB::raw('(DATE_FORMAT(scholarship.deadline, "%d-%m-%Y")) as scholarship_deadline'), 'member.*', DB::raw('(SELECT sum(total) FROM scholarship_variable where scholarship_variable.scholarship_id = scholarship.scholarship_id) as scholarship_target'), DB::raw('(IFNULL((select sum(total) from donation join transaction on donation.transaction_id = transaction.transaction_id where donation.scholarship_id = scholarship.scholarship_id and transaction.transaction_status_id = 2), 0)) as donation_total'))
            ->where('scholarship.scholarship_id', '=', $i)
            ->first();
        return $scholarship;

    }

    public function getFunderByScholarship($i){
        $funder = DB::table('member')
            ->join('transaction', 'member.member_id', '=', 'transaction.member_id')
            ->join('donation', 'transaction.transaction_id', '=', 'donation.transaction_id')
            ->select('member.*')
            ->groupBy('member.member_id')
            ->where('donation.scholarship_id', '=', $i)
            ->get();
        return $funder;
    }

    public function getVariableByScholarship($i){
        $variable = DB::table('scholarship_variable')
            ->join('scholarship', 'scholarship.scholarship_id', '=', 'scholarship_variable.scholarship_id')
            ->select('scholarship_variable.*')
            ->where('scholarship.scholarship_id', '=', $i)
            ->get();
        return $variable;
    }

    public function getAllRows(){
        $scholarship = DB::table('scholarship')
            ->join('member', 'scholarship.member_id', '=', 'member.member_id')
            ->select('scholarship.*', 'member.*', DB::raw('(DATE_FORMAT(register_date, "%H:%i %d-%m-%Y")) as scholarship_created'), DB::raw('(DATE_FORMAT(scholarship.deadline, "%d-%m-%Y")) as scholarship_deadline'), DB::raw('(SELECT sum(total) FROM scholarship_variable where scholarship_variable.scholarship_id = scholarship.scholarship_id) as scholarship_target'), DB::raw('(IFNULL((select sum(total) from donation join transaction on donation.transaction_id = transaction.transaction_id where donation.scholarship_id = scholarship.scholarship_id and transaction.transaction_status_id = 2), 0)) as donation_total'))
            ->orderBy(DB::raw('RAND()'))
            ->get();
        return $scholarship;
    }
}

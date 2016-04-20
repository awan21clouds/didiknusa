<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    public $timestamps = false;

    public function getAllRowsForScholarship(){
        $transaction = DB::table('location')
            ->where('location_id', '<>', '0')
            ->get();
        return $transaction;
    }
}

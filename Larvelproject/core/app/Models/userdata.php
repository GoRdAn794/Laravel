<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdata extends Model
{
    use HasFactory;
    public static function create($request)
    {
        $data = DB::table('usertable')->insertGetId($request);
        return $data;
    }
    // public static function showdata($request)
    // {
    //     $data = DB::table('usertable')->where('email', $request)->get();
    //     // return $data->password;
    //     print_r($data);
    //     die;
    // }
}

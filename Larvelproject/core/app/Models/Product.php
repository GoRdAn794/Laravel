<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = 'products';
    public static function showproduct()
    {
        $data = DB::table('products')->get()->toArray();
        return $data;
    }
    public static function deleteproduct($re)
    {
        $check = DB::table('products')->where('id', $re)->delete();
        return $check;
    }
    public static function selectrecord($re)
    {
        $check = DB::table('products')->select('Prodname', 'Sku', 'Category', 'price')->where('id', $re)->get()->toArray();
        return $check;
    }
    // public static function updateproduct($re)
    // {
    //     $name = $re->input();
    //     $query = DB::table('products')->insert([
    //         'Prodname' => $re->input('name'),
    //         'Sku' => $re->input('sku'),
    //         'Category' => $re->input('cat'),
    //         'price' => $re->input('price')
    //     ]);
    //     return $query;
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class multiauth extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'admintable';
}

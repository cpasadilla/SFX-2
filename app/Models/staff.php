<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   
class staff extends Authenticatable
{
    protected $fillable = ['user_id','position','location'];

    public function User(){
        return $this->belongsTo(User::class);
    }

}
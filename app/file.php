<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $fillable=['title','desc', 'file' , 'UserId'];
}

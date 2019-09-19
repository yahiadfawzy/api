<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//we can use model to insert updat read data easily
class post extends Model
{
    //
    protected $fillable = ['title','body'];

}

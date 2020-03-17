<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultasip extends Model
{
    //campos que se deben de escribir en la BDD
    protected $fillable =['numeroIp' , 'clase', 'created_at', 'updated_at'];
}
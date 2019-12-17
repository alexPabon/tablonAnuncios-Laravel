<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //campos que se deben de escribir en la BDD
    protected $fillable =['titulo','descripcion','precio','imagen','user_id'];
}

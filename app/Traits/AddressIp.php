<?php

namespace App\Traits;

use App\Consultasip;

trait AddressIp{
    
	public static function guardarIp(){
	    
		$direccionIP = $_SERVER['REMOTE_ADDR'];
        $nombreModulo = $_SERVER['REQUEST_URI'];

        $saveIp = new Consultasip();
        $saveIp->numeroIp = $direccionIP;
        $saveIp->clase = $nombreModulo;

        if(!$saveIp->save())  //guardar en la BDD
           abort(409,"Se produjo un Error");
        
	}
}
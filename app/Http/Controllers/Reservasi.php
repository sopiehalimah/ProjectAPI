<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\TiketAPI\APIController as API;

class Reservasi extends Controller
{
    public function flight()
    {
    	$s['airport'] = \App\Airport::all();
    	return view('reservasi.flight')->with($s);
    }
}

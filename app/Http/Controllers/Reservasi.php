<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\TiketAPI\APIController as API;

class Reservasi extends Controller
{
    public function flight()
    {
    	$s['airport'] = \App\Airport::all();
    	return view('reservasi.flight')->with($s);
    }

    public function searchflight()
    {
    	$data =[];
    	$data['d'] = Input::get('from');
    	$data['a'] = Input::get('to');
    	//format date YY-MM-DD
    	$data['date'] = date_format(
    						date_create(
    							Input::get('depart_date')
    							),"Y-m-d");
    	if(Input::get('type')=="RT"){
    		$data['ret_date'] = date_format(
    								date_create(
		    							Input::get('return_date')
		    							),"Y-m-d");
    	}
    	$data['adult'] = Input::get('adult');
    	$data['child'] = Input::get('child');
    	$data['infant'] = Input::get('infant');
    	$data['v'] = 1;

    	\Session::put('token','');

    	$newapi = new API;
    	$newapi->getCurl('search/flight');

    	$log = new \App\Logtrx;
    	$log->request = json_encode($data);
    	$log->token = session('token');
    	$log->save();

    	$sd = new \App\Search_Data;
    	$sd->depart_city = Input::get('from');
    	$sd->arrive_city = Input::get('to');
    	$sd->depart_date = $data['date'];

    	if(Input::get('type')=="RT"){
    		$sd->return_date = $data['ret_date'];
    	}
    	$sd->adult = Input::get('adult');
    	$sd->child = Input::get('child');
    	$sd->infant = Input::get('infant');
    	$sd->ver = $data['v'];
    	$sd->token = session('token');
    	$sd->save();

    	$hasil = $newapi->getCurl('search/flight',$data);

    	echo "<pre>".print_r(($hasil),1)."</pre>";

    }
}

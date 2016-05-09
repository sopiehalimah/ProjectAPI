<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\TiketAPI\APIController as API;

class HomeController extends Controller
{
    public function get_Currency()
    {
        $api = new API;
        $hasil = $api->getCurl('general_api/listCurrency');
        \App\Currency::whereRaw('id<>0')->delete();
        $data = array();
        foreach ($hasil->result as $key) {
            $curr = new \App\Currency;
            $curr->code = $key->code;
            $curr->name = $key->name;
            $curr->save();
            $data['id'][$curr->id]=$key->code;
        }
            echo json_encode(
                array(
                    'status_code'=>200,
                    'inserted_data'=>sizeof($data['id'])
                    )
                );
        
    }
        
    public function view_Currency()
    {
        $s['data'] = \App\Currency::all();
        return view('master.currency')->with($s);
    }
    
     public function get_Country()
    {
        $api = new API;
        $hasil = $api->getCurl('general_api/listCountry');
        \App\Country::whereRaw('id<>0')->delete();
        $data = array();
        foreach ($hasil->listCountry as $key) {
            $ctr = new \App\Country;
            $ctr->country_id = $key->country_id;
            $ctr->country_name = $key->country_name;
            $ctr->country_areacode = $key->country_areacode;
            $ctr->save();
            $data['id'][$ctr->id]=$key->country_id;
        }
            echo json_encode(
                array(
                    'status_code'=>200,
                    'inserted_data'=>sizeof($data['id'])
                    )
                );
        
    }
        
    public function view_Country()
    {
        $s['data'] = \App\Country::all();
        return view('master.country')->with($s);
    }

    public function get_Lang()
    {
        $api = new API;
        $hasil = $api->getCurl('general_api/listLanguage');
        \App\Lang::whereRaw('id>0')->delete();
        $data = array();
        foreach ($hasil->result as $key) {
            $lang = new \App\Lang;
            $lang->code = $key->code;
            $lang->name_long = $key->name_long;
            $lang->name_short = $key->name_short;
            $lang->save();
            $data['id'][$lang->id]=$key->code;
        }
            echo json_encode(
                array(
                    'status_code'=>200,
                    'inserted_data'=>sizeof($data['id'])
                    )
                );
        
    }
        
    public function view_Lang()
    {
        $s['data'] = \App\Lang::all();
        return view('master.lang')->with($s);
    }

     public function get_Airport()
    {
        $api = new API;
        $hasil = $api->getCurl('flight_api/all_airport');
        \App\Airport::whereRaw('id>0')->delete();
        $data = array();
        foreach ($hasil->all_airport->airport as $key) {
            $arp = new \App\Airport;
            $arp->airport_name = $key->airport_name;
            $arp->airport_code = $key->airport_code;
            $arp->location_name = $key->location_name;
            $arp->country_id = $key->country_id;
            $arp->save();
            $data['id'][$arp->id]=$key->airport_code;
        }
            echo json_encode(
                array(
                    'status_code'=>200,
                    'inserted_data'=>sizeof($data['id'])
                    )
                );
        
    }
        
    public function view_Airport()
    {
        $s['data'] = \App\Airport::all();
        return view('master.airport')->with($s);
    }

    
}

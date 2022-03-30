<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class NBP extends Controller
{
    public function show(){
        $api = Http::get('http://api.nbp.pl/api/exchangerates/tables/C/?format=json')->json();
        // return $api[0]['rates'][1]['currency'];
        // return print_r($api);
        return view('nbp_show', ['api'=>$api]);
    }
    public function calc(){
        $api = Http::get('http://api.nbp.pl/api/exchangerates/tables/C/?format=json')->json();
        return view('nbp_calc', ['api'=>$api]);
    }
}

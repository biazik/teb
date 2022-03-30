<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Data extends Controller
{
    public function list(){
        $httptext = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        $text = "<h1>Data from https://jsonplaceholder.typicode.com/posts </h1>";
        foreach ($httptext as $key => $value) {
            $userId = $httptext[$key]['userId'];
            $id = $httptext[$key]['id'];
            $title = $httptext[$key]['title'];
            $body = $httptext[$key]['body'];
            $text = $text."<br>UserId: $userId, id: $id <br>Title: $title<br>Body: $body<br>";
        }
        return $text;
        // $httptext = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        // $text = "<h1>Data from https://jsonplaceholder.typicode.com/posts </h1>";
        // foreach ($httptext as $key => $value) {
        //     $userId = $httptext[$key]['userId'];
        //     $id = $httptext[$key]['id'];
        //     $title = $httptext[$key]['title'];
        //     $body = $httptext[$key]['body'];
        //     $text = $text."<br>UserId: $userId, id: $id <br>Title: $title<br>Body: $body<br>";
        // }
        // return $text;
    }
    public function test(){
        $json = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        return view('data', ['json'=>$json]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Facades\GetRickAndMortyApiData;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return GetRickAndMortyApiData::getCharacter();
//        return view('home');
    }
}

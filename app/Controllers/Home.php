<?php

namespace App\Controllers;

// use App\Models\MuseumModel;

class Home extends BaseController
{

    public function index()
    {
        return view('home');
    }
}


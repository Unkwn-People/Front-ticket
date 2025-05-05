<?php

namespace App\Controllers;

// use App\Models\MuseumModel;

use App\Controllers\BaseController;

class Museum extends BaseController
{
    public function index()
    {
        return view('museum/index');
    }

    public function Pesan()
    {
        return view('museum/pesan');
    }
}

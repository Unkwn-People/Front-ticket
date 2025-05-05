<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in') == TRUE){
            return view('admin/home');

        } else {
            return redirect()->to('admin/login');
        }
    }
}


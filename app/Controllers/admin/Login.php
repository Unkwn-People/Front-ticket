<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel; // tambahkan ini jika terjadi error dengan kalimat seperti ini (Class "App\Controllers\Admin\AdminModel" not found)
use CodeIgniter\HTTP\ResponseInterface;


class Login extends BaseController
{
    protected $login;

    public function __construct()  
    {
        $this->login = new AdminModel();
        // semua yang dibutuhkan dalam 1 contrller menggunakan helper yang
        helper(['form', 'url']); //dengan ditambahkan nya ini misal kita telah mengisi email di login, lalu yang password tidak kita isi lalu kita tombol login, email yang sudah kita isi tidak hilang.
    }
    public function index()
    {
        return view('admin/login/index');
    }

    public function cek()
    {
        //Validation//
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];

        $pesan = [
            'email' => [
                    'required' => 'Tolong diisi yah!',
                    'valid_email' => 'Format Email salah!'
            ],
            'password' => [
                    'required' => 'Tolong diisi yah!',
            ]
        ];   
        
        if (!$this->validate($rules, $pesan)) {
            $data['validation'] = $this->validator;
            return view('admin/login/index', $data);
        }
             //Tampung semua inputan ke dalam variable//
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $dataLogin = $this->login->where(['email' =>$email])->first();
            //
            
            if($dataLogin){
                if(password_verify($password, $dataLogin->password)){
                    session()->set([
                        'id_admin' => $dataLogin->id_admin,
                        'logged_in' => true,
                        'nama' => $dataLogin->nama
                ]);
                return redirect()->to('admin/home');
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('admin/login');
            }
            } else {
                session()->setFlashdata('error', 'Email salah!');
                return redirect()->to('admin/login');
            }

        }
        public function keluar() //ini untuk logout//
        {
            session()->destroy();

            return redirect('admin');
        }
    }



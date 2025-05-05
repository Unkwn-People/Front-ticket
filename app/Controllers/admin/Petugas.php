<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class Petugas extends BaseController
{
        protected $petugas;
        public function __construct()
        {
            $this->petugas = new AdminModel();
            helper(['form', 'url']);   
        }
        public function index()
        {
            if (session()->get('logged_in') == true) { //bagian ini digunakan agar tidak bisa masuk ke halaman melalui url, melainkan harus lewat login. //
                $data['petugas'] = $this->petugas->findAll();
                return view('admin/petugas/index', $data);
            } else {
                return redirect()->to('admin/login');
            }
        }

        //add
        public function add()
        {
            if (session()->get('logged_in') == true) { //bagian ini digunakan agar tidak bisa masuk ke halaman melalui url, melainkan harus lewat login. //
                return view('admin/petugas/add');
            } else {
                return redirect()->to('admin/login');
            }
        }

        //save
        public function save()
        {
            if (session()->get('logged_in') == true) { //bagian ini digunakan agar tidak bisa masuk ke halaman melalui url, melainkan harus lewat login. //
                //validation 
                $rules =[
                    'nama' => 'required',
                    'email' => 'required|valid_email',
                    'password' => 'required',
                    'upass' => 'required|matches[password]'
                ];
                $pesan = [
                    'nama' => [
                            'required' => 'Tolong diisi yah!',
                        ],
                    'email' => [
                            'required' => 'Tolong diisi yah!',
                            'valid_email' => 'Format email salah',
                        ],
                    'password' => [
                            'required' => 'Tolong diisi yah!',
                        ],
                    'upass' => [
                            'required' => 'Tolong diisi yah!',
                            'matches' => 'Password tidak sesuai!',
                        ],
                ];
                if(!$this->validate($rules, $pesan)) {
                    $data['validation'] = $this->validator;
                    return view('admin/petugas/add', $data);
                }

                //Tampung semua inputan ke dalam variable//
                $nama=$this->request->getVar('nama');
                $email=$this->request->getVar('email');
                $password=password_hash($this->request->getVar('password'), PASSWORD_BCRYPT); 
                //

                //variable data//
                $data= [
                    'nama' =>$nama,
                    'email' =>$email,
                    'password' =>$password
                ];
                //
                $this->petugas->save($data);

                return redirect()->to('admin/petugas');

            } else {
                return redirect()->to('admin/login');
            }
        
        //edit
        }
        public function edit($id)
        {
            $data['cari'] = $this->petugas->where(['id_admin'=>$id])->first();
            return view('admin/petugas/edit', $data);
        }

        //update
        public function update()
        {
            //Tampung semua inputan ke dalam variable//
            $id = $this->request->getVar('kode'); //terhubung dengan id admin terletak di(view/admin/petugas/edit.php)//
            
            $nama = $this->request->getVar('nama');
            $email = $this->request->getVar('email');
            $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT); 
            
            //jika kosong isi dari inputan password//
            if (empty($this->request->getVar('password'))) {
                $data= [
                    'id_admin' => $id,
                    'nama' => $nama,
                    'email' => $email,
                ];
            //jika berisi//
            } else {
                $data= [
                    'id_admin' => $id,
                    'nama' => $nama,
                    'email' => $email,
                    'password' => $password
                ];
            }
            
            $this->petugas->save($data);

            return redirect()->to('admin/petugas');
            //
        }

        //delete
        public function delete($id)
        {
            $this->petugas->delete($id);

            return redirect()->to('admin/petugas');
        }

    
}


<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MuseumModel;

class Museum extends BaseController
{
    protected $museum;
    public function __construct()
    {
        $this->museum = new MuseumModel();
    }
    public function index()
    {
        if (session()->get('logged_in') == true) { //bagian ini digunakan agar tidak bisa masuk ke halaman melalui url, melainkan harus lewat login. //
            $data['museum'] = $this->museum->findAll();
            return view('admin/museum/index', $data);
        } else {
            return redirect()->to('admin/login');
        }
    }
    public function add()
    {   
        if (session()->get('logged_in') == true) {
        return view('admin/museum/add');
        }else {
            return redirect()->to('admin/login');
        }
        
    }
    public function save()
    {
        if (session()->get('logged_in') == true) {
        //validation
        $rules= [
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tidak boleh kosong!']
            ],
            'des' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tidak boleh kosong!']
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tidak boleh kosong!']
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                            'uploaded' => 'Tidak boleh kosong!',
                            'mime_in' => 'Tipe file tidak sesuai!'
                        ]
            ],
            
        ];
        if(!$this->validate($rules)) {
            $data['validation'] = $this->validator->getErrors();
            return view('admin/museum/add', $data);
        }

        //Tampung semua inputan ke dalam variable//
        $nama=$this->request->getVar('nama');
        $des=$this->request->getVar('des');
        $harga=$this->request->getVar('harga');
        $foto=$this->request->getFile('foto');
        $foto->move(WRITEPATH . '../public/foto');
        //

        $data = [
            'nama_museum'=>$nama,
            'deskripsi'=>$des,
            'harga'=>$harga,
            'foto'=>$foto->getClientName()
        ];
        $this->museum->save($data);

        return redirect()->to('admin/museum');
        }else {
                return redirect()->to('admin/login');
            }
    }
    public function edit($id){
        if (session()->get('logged_in') == true) {
        $data['cari'] = $this->museum->where(['id_museum' => $id])->first();
        return view('admin/museum/edit', $data);
        }else {
            return redirect()->to('admin/login');
        }
    }
    public function update(){
        if (session()->get('logged_in') == true) {

        $id=$this->request->getvar('kode'); //ngambil dari id_museum//
        $nama=$this->request->getVar('nama');
        $des=$this->request->getVar('des');
        $harga=$this->request->getVar('harga');
        $foto=$this->request->getFile('foto');
        $foto->move(WRITEPATH . '../public/foto');

        $data = [
            'id_museum'=>$id, //ini disajikan (primary siapa apa, datanya apa) jika ditemukan nanti ditemukan id nya di (table museum) yang sama maka bukan melakukan tambah data baru melainkan update sesuai data yang baru //
            'nama_museum'=>$nama,
            'deskripsi'=>$des,
            'harga'=>$harga,
            'foto'=>$foto->getClientName()
        ];
        $this->museum->save($data); //kenapa menggunakan save, jadi jika ada data id museum yang dimasukkan jadi sifatnya mengupdate jika menggunakan model save//

        return redirect()->to('admin/museum');
        }else {
            return redirect()->to('admin/login');
        }
    }
    public function delete($id){
        if (session()->get('logged_in') == true) {

        $this->museum->delete($id);
        return redirect()->to('admin/museum');
        
        }else {
            return redirect()->to('admin/login');
        }
        
    }
}


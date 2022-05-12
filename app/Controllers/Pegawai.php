<?php

namespace App\Controllers;

use CodeIgniter\Validation\Rules;

class Pegawai extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // $this->db = \Config\Database::connect();
        $data = [
           'title' => 'Aplikasi Iventaris',
           'pegawai' => $this->db->table('pegawai')->get()->getResultArray()
        ];
        return view('pegawai/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form Tambah pegawai',
            'validation' => \Config\Services::validation()
        ];
        return view('pegawai/create', $data);
    }

    public function save()
    {
        // validasi
        if (!$this->validate([      
            'nama_pegawai' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'nama pegawai tidak boleh kosong!.'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'no hp pegawai tidak boleh kosong!.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'Alamat pegawai tidak boleh kosong!.'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'Jabatan pegawai tidak boleh kosong!.'
                ]
            ],
            'image' => [
                'Rules' => 'max_size[image,1024]|is_image[image]|mime_in
                [image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih file terlebih dahulu!',
                    'max_size' => 'ukuran file terlalu besar!',
                    'is_image' => 'yang anda pilih bukan gambar!',
                    'mime_in' => 'yang anda pilih bukan gambar!'
                ]
            ]
                    
        ])){
            return redirect()->to('pegawai/create')->withInput();
        }
        $filepoto = $this->request->getFile('image');
        $namaImage = $filepoto->getRandomName();
        $filepoto->move('assets/img', $namaImage);

        $data = [
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'jabatan' => $this->request->getVar('jabatan'),
            'poto' => $namaImage

        ];
        $this->db->table('pegawai')->insert($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/pegawai/index');
    }
    
    public function delete($id_pegawai)
    {
        $this->db->table('pegawai')->delete(['id_pegawai' => $id_pegawai]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/pegawai/index');
    }

    public function edit($id_pegawai)
    {
        $data = [
            'title' => ' From Edit pegawai',
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->db->query("SELECT * FROM pegawai WHERE 
            id_pegawai='$id_pegawai'")->getResultArray()
        ];
        return view('pegawai/edit', $data);
    }

    public function update($id_pegawai)
    {
    //     $filepoto = $this->request->getFile('image');
    //     if ($filepoto->getError() == 4){
    //         $namaImage = $this->request->getVar('foto');
    //     }else {
    //         // generate nama file random
    //         $namaImage = $filepoto->getRandomName();
    //         // pindah poto
    //         $filepoto->move('assets/img/'. $namaImage);
    //         // hapus file lama
    //         //unlink('assets/img/'. $this->request->getVar('poto'));
    //    }
        $filepoto = $this->request->getFile('image');
        $namaImage = $this->request->getVar('foto');
        $namaImage = $filepoto->getRandomName();
        $filepoto->move('assets/img', $namaImage);
        $data =[
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'jabatan' => $this->request->getVar('jabatan'),
            'poto' => $namaImage
        ];
        $builder = $this->db->table('pegawai');
        $builder->where('id_pegawai', $id_pegawai);
        $builder->update($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/pegawai/index');
    }
    
}

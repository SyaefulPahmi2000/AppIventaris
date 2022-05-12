<?php

namespace App\Controllers;

class Ruangan extends BaseController
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
           'ruangan' => $this->db->table('ruangan')->get()->getResultArray()
        ];
        return view('ruangan/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Ruangan',
            'validation' => \Config\Services::validation()
        ];
        return view('ruangan/create', $data);
    }

    public function save()
    {
        // validasi
        if (!$this->validate([      
            'nama_ruangan' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'nama ruangan tidak boleh kosong!.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'lokasi ruangan tidak boleh kosong!.'
                ]
            ]
                    
        ]))
        return redirect()->to('ruangan/create')->withInput();
        $data = [
            'kode_ruangan' => $this->request->getVar('kode_ruangan'),
            'nama_ruangan' => $this->request->getVar('nama_ruangan'),
            'lokasi' => $this->request->getVar('lokasi')

        ];
        $this->db->table('ruangan')->insert($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/ruangan/index');
    }
    

    public function delete($kode_ruangan)
    {
        $this->db->table('ruangan')->delete(['kode_ruangan' => $kode_ruangan]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/ruangan/index');
    }

    public function edit($kode_ruangan)
    {
        $data = [
            'title' => ' From Edit Ruangan',
            'validation' => \Config\Services::validation(),
            'ruangan' => $this->db->query("SELECT * FROM ruangan WHERE 
            kode_ruangan='$kode_ruangan'")->getResultArray()
        ];
        return view('ruangan/edit', $data);
    }

    public function update($kode_ruangan)
    {
        $data =[
            'nama_ruangan' => $this->request->getVar('nama_ruangan'),
            'lokasi' => $this->request->getVar('lokasi')
        ];
        $builder = $this->db->table('ruangan');
        $builder->where('kode_ruangan', $kode_ruangan);
        $builder->update($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/ruangan/index');
    }
    
}

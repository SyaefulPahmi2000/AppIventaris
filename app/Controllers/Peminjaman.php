<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;

class Peminjaman extends BaseController
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
           'peminjam' => $this->db->query("SELECT * FROM peminjam JOIN pegawai ON 
           peminjam.id_pegawai=pegawai.id_pegawai ORDER BY peminjam.tgl_pinjam DESC")->getResultArray()
        ];
        return view('peminjaman/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => ' From Peminjaman Barang',
            'validation' => \config\Services::validation(),
            'barang' => $this->db->table('barang')->get()->getResultArray(),
            'pegawai' => $this->db->table('pegawai')->get()->getResultArray()
            
        ];
        return view('peminjaman/create', $data);
    }
    public function save()
    {
          

        // kondisi cek
        $kode = $this->request->getVar('kode_barang');
        $data = $this->db->query("SELECT * FROM peminjam WHERE status=0 AND kode_barang='$kode'")->getRow();
        //dd($data); die;
        if($data){
            session()->setFlashdata('message', '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            swal.fire({
                title: "opps..",
                text: "Barang Sedang DiPinjam, Pengajuan Ditolak!",
                icon: "error",
                button: "Aww yiss!",
              });
            </script>');
            return redirect()->to('peminjaman/create');
        }else{
            $this->db->table('peminjam')->insert([
                'kode_barang' => $this->request->getVar('kode_barang'),
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
                'tgl_kembali' => $this->request->getVar('tgl_kembali'),
                'no_hp' => $this->request->getVar('no_hp'),
                'nama_peminjam' => $this->request->getVar('nama_peminjam'),
                'keterangan' => $this->request->getVar('keterangan'),
                'status' => 0
    
            ]);
            session()->setFlashdata('message', 'Data Berhasil Disave');
            return redirect()->to('/peminjaman/index');
        }
     
    }

    public function kembali($kode_peminjam)
    {
        $cek = $this->db->query("SELECT * FROM peminjam WHERE kode_peminjam='$kode_peminjam'")->getResultArray();
        foreach ($cek as $key){
            $tgl_pinjam = $key['tgl_pinjam'];
            $tgl_kembali = $key['tgl_kembali'];
        }
        $tgl_pengembalian = date('y-m-d');
        if($tgl_pengembalian > $tgl_kembali){
            $ket = "Telat!";
        }elseif($tgl_pengembalian == $tgl_kembali){
            $ket = "pengengmbalian tepat waktu!";
        }else{
            $ket = "korupsi";
        }

        $this->db->query("UPDATE peminjam set status=1 WHERE kode_peminjam='$kode_peminjam'");
        $message = "Berhasil Dikembalikan Dengan Status " .$ket;
        session()->setFlashdata('message', $message);
        return redirect()->to('/peminjaman/index');
    }
}


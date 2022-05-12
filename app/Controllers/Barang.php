<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Barang extends BaseController
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
           'barang' => $this->db->query("SELECT * FROM barang JOIN pegawai ON 
           barang.id_pegawai=pegawai.id_pegawai JOIN ruangan ON barang.kode_ruangan=ruangan.kode_ruangan")->getResultArray()
        ];
        return view('barang/index', $data);
    }
    // public function create()
    // {
    //     $data = [
    //         'title' => 'Form Barang'
    //     ];
    //     return view('barang/create', $data);
    // }

    public function create()
    {
        $data = [
            'title' => ' From Tambah Barang',
            'validation' => \config\Services::validation(),
            'pegawai' => $this->db->table('pegawai')->get()->getResultArray(),
            'ruangan' => $this->db->table('ruangan')->get()->getResultArray()
            
        ];
        return view('barang/create', $data);
    }
    public function save()
    {
        // validasi
        if (!$this->validate([
            'kode_barang' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'kode barang harus di isi.'
                ]
            ],
            
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'nama barang harus di isi.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'jumlah barang harus di isi.'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'tahun barang harus di isi.'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'harga barang harus di isi.'
                ]
            ]
            
        ]))
        return redirect()->to('barang/create')->withInput();

        $this->db->table('barang')->insert([
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'tahun_pembelian' => $this->request->getVar('tahun'),
            'harga_barang' => $this->request->getVar('harga'),
            'id_pegawai' => $this->request->getVar('penanggung_jawab'),
            'kode_ruangan' => $this->request->getVar('ruangan')
        ]);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/barang/index');
    }

    public function delete($kode_barang)
    {
        $this->db->table('barang')->delete(['kode_barang' => $kode_barang]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/barang/index');
    }

    public function edit($kode_barang)
    {
        $data = [
            'title' => ' From Edit Barang',
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->db->table('pegawai')->get()->getResultArray(),
            'ruangan' => $this->db->table('ruangan')->get()->getResultArray(),
            'barang' => $this->db->query("SELECT * FROM barang WHERE 
            kode_barang='$kode_barang'")->getResultArray()
        ];
        return view('barang/edit', $data);
    }

    public function update($kode_barang)
    {
        $data =[
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'tahun_pembelian' => $this->request->getVar('tahun'),
            'harga_barang' => $this->request->getVar('harga'),
            'id_pegawai' => $this->request->getVar('penanggung_jawab'),
            'kode_ruangan' => $this->request->getVar('ruangan')
        ];
        $builder = $this->db->table('barang');
        $builder->where('kode_barang', $kode_barang);
        $builder->update($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/barang/index');
        
    }

    public function export()
    {
       $dataBarang = $this->db->table('barang')->get()->getResultArray();
       $spreadsheet = new Spreadsheet();
       // tulis header/nama kolom 
       $spreadsheet->setActiveSheetIndex(0)
                   ->setCellValue('A1', 'Kode Barang')
                   ->setCellValue('B1', 'Nama Barang')
                   ->setCellValue('C1', 'Jumlah')
                   ->setCellValue('D1', 'Harga Barang')
                   ->setCellValue('E1', 'Tahun Pembelian')
                   ->setCellValue('F1', 'Jenis Barang');
       
       $column = 2;
       // tulis data mobil ke cell
       foreach($dataBarang as $data) {
           $spreadsheet->setActiveSheetIndex(0)
                       ->setCellValue('A' . $column, $data['kode_barang'])
                       ->setCellValue('B' . $column, $data['nama_barang'])
                       ->setCellValue('C' . $column, $data['jumlah'])
                       ->setCellValue('D' . $column, $data['harga_barang'])
                       ->setCellValue('E' . $column, $data['tahun_pembelian'])
                       ->setCellValue('F' . $column, $data['jenis_barang']);
           $column++;
       }
       // tulis dalam format .xlsx
       $writer = new Xlsx($spreadsheet);
       $fileName = 'Data Barang';
   
       // Redirect hasil generate xlsx ke web client
       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
       header('Cache-Control: max-age=0');
   
       $writer->save('php://output');
   
       

    }
}

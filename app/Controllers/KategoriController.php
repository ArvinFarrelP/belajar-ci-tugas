<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategori; 

    function __construct()
    {
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->kategori->findAll();
        $data['kategori'] = $kategori;

        return view('v_kategori', $data);
    }

    public function create()
    {
        $dataForm = [
            'nama_kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->kategori->insert($dataForm);

        return redirect('kategori')->with('success', 'Data Berhasil Ditambah');
    } 


    public function edit($id)
    {
        $dataForm = [
            'nama_kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->kategori->update($id, $dataForm);

        return redirect('kategori')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $this->kategori->delete($id);

        return redirect('kategori')->with('success', 'Data Berhasil Dihapus');
    }
}
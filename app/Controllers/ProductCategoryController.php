<?php

namespace App\Controllers;
use App\Models\KategoriModel;

class ProductCategoryController extends BaseController
{
    protected $kategori;

    public function __construct()
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
    $dataFoto = $this->request->getFile('foto');
        $dataForm = [
        'name' => $this->request->getPost('name'),
        'created_at' => date("Y-m-d H:i:s")
    ];

     $this->kategori->insert($dataForm);
   return redirect('kategori')->with('success', 'Data Berhasil Ditambah');
}
 public function edit($id)
{
    $dataProduk = $this->kategori->find($id);

    $dataForm = [
        'name' => $this->request->getPost('name'),
        'updated_at' => date("Y-m-d H:i:s")
    ];

    $dataFoto = $this->request->getFile('foto');
    $this->kategori->update($id, $dataForm);

    return redirect('kategori')->with('success', 'Data Berhasil Diubah');
}

public function delete($id)
{
    $dataProduk = $this->kategori->find($id);

    

    $this->kategori->delete($id);

    return redirect('kategori')->with('success', 'Data Berhasil Dihapus');
}
}
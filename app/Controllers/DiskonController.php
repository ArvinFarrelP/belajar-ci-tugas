<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;
    public function __construct()
    {
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        $diskon = $this->diskon->findAll();
        $data['diskon'] = $diskon;

        return view('v_diskon', $data);
    }

    public function create()          
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/');
        return view('diskon/diskon', ['mode'=>'create']);
    }

    public function store()
    {
        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                    ->withInput()
                    ->with('failed', $this->validator->listErrors());   // ⬅️ flash error
        }

        $this->diskon->insert([
            'tanggal'    => $this->request->getVar('tanggal'),
            'nominal'    => $this->request->getVar('nominal'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/diskon')->with('success','Data berhasil ditambah');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/');

        return view('diskon/diskon', [
            'mode'     => 'edit',
            'editData' => $this->diskon->find($id)
        ]);
    }

    public function update($id)
    {
        $this->diskon->update($id, [
            'nominal'    => $this->request->getVar('nominal'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/diskon')->with('success','Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);
        return redirect()->to('/diskon')->with('success','Data berhasil dihapus');
    }
}
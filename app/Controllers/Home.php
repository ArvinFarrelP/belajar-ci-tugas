<?php

namespace App\Controllers;

use App\Database\Migrations\Product;

use App\Models\ProductModel; 

class Home extends BaseController
{
    protected $product;

    public function __construct() {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
    }

    public function index()
    {
        $Product = $this->product->findAll();
        $data['product'] = $Product;
        
        return view('v_home',$data);
    }
}
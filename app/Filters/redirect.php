<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Redirect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // tidak perlu isi apa-apa di sini
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('isLoggedIn') && !session()->get('redirected')) {
            session()->set('redirected', true);

            // Redirect berdasarkan role
            if (session()->get('role') === 'admin') {
                return redirect()->to('/produk'); // semisal adalah admin, bisa akses produk sesuai di sidebar.php
            } else {
                return redirect()->to('/'); // selain admin, misla member akan diarahkan ke home seperti biasa.
            }
        }
    }
}

?>
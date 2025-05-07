<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->checkSession(); // Vérification de la session
        return view('dashboard');
    }
}

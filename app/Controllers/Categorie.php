<?php
namespace App\Controllers;

class Categorie extends BaseController
{
    public function index(): string
    {
        return view('categorie');
    }
}
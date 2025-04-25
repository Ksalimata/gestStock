<?php
namespace App\Controllers;

class Produits extends BaseController
{
    public function index(): string
    {
        return view('produits');
    }
}
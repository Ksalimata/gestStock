<?php
namespace App\Controllers;

class Mouvement extends BaseController
{
    public function index(): string
    {
        return view('mouvement');
    }
}
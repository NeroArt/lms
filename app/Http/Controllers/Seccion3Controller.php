<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Seccion3Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('cliente.seccion3');
    }
}

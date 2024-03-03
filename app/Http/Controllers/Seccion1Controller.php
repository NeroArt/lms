<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Seccion1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('cliente.seccion1');
    }
}

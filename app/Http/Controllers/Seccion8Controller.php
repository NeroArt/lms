<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Seccion8Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('cliente.seccion8');
    }
}

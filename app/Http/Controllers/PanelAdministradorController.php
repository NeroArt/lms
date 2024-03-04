<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelAdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }

    public function index()
    {
        return view('home');
    }
}

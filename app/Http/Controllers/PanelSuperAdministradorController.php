<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelSuperAdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index()
    {
        return view('superadministrador.panelsuperadministrador');
    }
}

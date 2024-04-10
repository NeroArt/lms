<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\previo_inicio;
use App\Models\previo_inicios_actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class Seccion8Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cliente');
    }
    
    public function index()
    {
        return view('cliente.seccion8');
    }
}

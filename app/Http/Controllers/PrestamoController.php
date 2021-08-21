<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RazonPrestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{


    public function verEvaluar(){

        $listaRazonesPrestamo = RazonPrestamo::All();
        return  view('Prestamos.EvaluarPrestamo',compact('listaRazonesPrestamo'));
    }




}

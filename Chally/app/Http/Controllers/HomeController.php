<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Usuario;
use App\Desafio;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all();
        $usuarios = Usuario::all();
        $desafios = Desafio::all();
        return view('index', ['categorias' => $categorias, 'usuarios' => $usuarios,'desafios' => $desafios]);
    }
}

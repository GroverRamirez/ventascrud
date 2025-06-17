<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with(['productos' => function($q) {
            $q->select('id', 'nombre', 'precio', 'categoria_id');
        }])->get(['id', 'nombre']);

        return Inertia::render('Welcome', [
            'categorias' => $categorias
        ]);
    }
}

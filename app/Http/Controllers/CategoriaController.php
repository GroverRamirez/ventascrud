<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Muestra un listado de las categorías.
     */
    public function index()
    {
        return Inertia::render('Categorias/Index', [
            'categorias' => Categoria::paginate(10)
        ]);
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        return Inertia::render('Categorias/Create');
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente');
    }

    /**
     * Muestra la información de una categoría específica.
     */
    public function show(Categoria $categoria)
    {
        return Inertia::render('Categorias/Show', [
            'categoria' => $categoria->load('productos')
        ]);
    }

    /**
     * Muestra el formulario para editar una categoría existente.
     */
    public function edit(Categoria $categoria)
    {
        return Inertia::render('Categorias/Edit', [
            'categoria' => $categoria
        ]);
    }

    /**
     * Actualiza la información de una categoría en la base de datos.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente');
    }

    /**
     * Elimina una categoría de la base de datos.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría eliminada exitosamente');
    }

    /**
     * Devuelve todas las categorías con sus productos asociados (API).
     */
    public function categoriasConProductos()
    {
        $categorias = \App\Models\Categoria::with('productos')->get();
        return response()->json($categorias);
    }
}

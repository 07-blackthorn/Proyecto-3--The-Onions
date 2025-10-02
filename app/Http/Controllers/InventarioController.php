<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventario = Inventario::with('producto')->get();
        $productos = Producto::all();
        
        return view('inventario.index', compact('inventario', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        return view('inventario.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'modelo' => 'nullable|string|max:255', // CAMBIADO: ubicacion → modelo
        ]);

        // Verificar si ya existe registro para este producto
        $inventarioExistente = Inventario::where('producto_id', $request->producto_id)->first();

        if ($inventarioExistente) {
            return redirect()->back()
                ->with('error', 'Ya existe un registro de inventario para este producto. Use la función de editar.');
        }

        Inventario::create($request->all());

        return redirect()->route('inventario.index')
            ->with('success', 'Registro de inventario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        return view('inventario.show', compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        $productos = Producto::all();
        return view('inventario.edit', compact('inventario', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'modelo' => 'nullable|string|max:255', // CAMBIADO: ubicacion → modelo
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventario.index')
            ->with('success', 'Registro de inventario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventario.index')
            ->with('success', 'Registro de inventario eliminado correctamente.');
    }

    /**
     * Actualizar stock manualmente
     */
    public function actualizarStock(Request $request, Inventario $inventario)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:0',
        ]);

        $inventario->update(['cantidad' => $request->cantidad]);

        return redirect()->route('inventario.index')
            ->with('success', 'Stock actualizado correctamente.');
    }
}
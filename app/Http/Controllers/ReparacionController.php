<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReparacionController extends Controller
{
    /**
     * Muestra una lista de todas las reparaciones.
     */
    public function index()
    {
        $reparaciones = Reparacion::orderBy('created_at', 'desc')->get();
        return view('reparaciones.index', compact('reparaciones'));
    }

    /**
     * Muestra el formulario para crear una nueva reparación.
     */
    public function create()
    {
        return view('reparaciones.create');
    }

    /**
     * Guarda una nueva reparación en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_telefono' => 'required|string|max:20',
            'cliente_email' => 'nullable|email|max:255',
            'dispositivo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'problema' => 'required|string',
            'estado' => 'nullable|string|max:100',
            'costo_estimado' => 'nullable|numeric|min:0',
            'fecha_ingreso' => 'required|date',
            'fecha_entrega_estimada' => 'nullable|date|after_or_equal:fecha_ingreso'
        ]);

        Reparacion::create($validatedData);

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación registrada exitosamente.');
    }

    /**
     * Muestra los detalles de una reparación específica.
     */
    public function show(Reparacion $reparacion)
    {
        return view('reparaciones.show', compact('reparacion'));
    }

    /**
     * Muestra el formulario para editar una reparación existente.
     */
    public function edit(Reparacion $reparacion)
    {
        return view('reparaciones.edit', compact('reparacion'));
    }

    /**
     * Actualiza una reparación en la base de datos.
     */
    public function update(Request $request, Reparacion $reparacion)
    {
        $validatedData = $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_telefono' => 'required|string|max:20',
            'cliente_email' => 'nullable|email|max:255',
            'dispositivo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'problema' => 'required|string',
            'estado' => 'required|string|max:100',
            'costo_estimado' => 'nullable|numeric|min:0',
            'fecha_ingreso' => 'required|date',
            'fecha_entrega_estimada' => 'nullable|date|after_or_equal:fecha_ingreso'
        ]);

        $reparacion->update($validatedData);

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación actualizada exitosamente.');
    }

    /**
     * Elimina una reparación de la base de datos.
     */
    public function destroy(Reparacion $reparacion)
    {
        $reparacion->delete();

        return redirect()->route('reparaciones.index')
            ->with('success', 'Reparación eliminada exitosamente.');
    }

    public function enviarAlerta(Reparacion $reparacion)
{
    // Validar que exista correo
    if (!$reparacion->cliente_email) {
        return back()->with('error', 'El cliente no tiene correo registrado.');
    }

    // Enviar correo
    Mail::to($reparacion->cliente_email)
    ->send(new \App\Mail\AlertaRetraso($reparacion));

    return back()->with('success', 'Alerta de retraso enviada al cliente.');
}

}

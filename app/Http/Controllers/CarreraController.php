<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('admin.carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
    
        Carrera::create([
            'nombre' => $request->nombre
        ]);
    
        return redirect('/admin/carreras')->with('success', 'Carrera registrada correctamente');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Carreras $carreras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carrera = Carrera::find($id);
        return view('admin.carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
    
        $carrera = Carrera::findOrFail($id);
        $carrera->update([
            'nombre' => $request->nombre
        ]);
    
        return redirect('/admin/carreras')->with('success', 'Carrera actualizada correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id);
    
        if (!$carrera) {
            return redirect()->back()->with('error', 'Carrera no encontrada.');
        }
    
        $carrera->delete(); // Elimina la carrera
    
        return redirect()->route('admin.carreras.index')->with('success', 'Carrera eliminada correctamente.');
    }
    
}


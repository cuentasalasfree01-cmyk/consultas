<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use App\Models\Client;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::all();
        return view('procedures.index', compact('procedures'));
    }

    public function create()
    {
        return view('procedures.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Procedure::create($data);

        return redirect()->route('procedures.index')->with('success', 'Trámite creado correctamente');
    }

    public function show(Procedure $procedure)
    {
        // Cargar clientes relacionados con estado y porcentaje, si necesitas mostrar esa info:
        $procedure->load('clients');
        return view('procedures.show', compact('procedure'));
    }

    public function edit(Procedure $procedure)
    {
        return view('procedures.edit', compact('procedure'));
    }

    public function update(Request $request, Procedure $procedure)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $procedure->update($data);

        return redirect()->route('procedures.index')->with('success', 'Trámite actualizado correctamente');
    }

    public function destroy(Procedure $procedure)
    {
        $procedure->delete();

        return redirect()->route('procedures.index')->with('success', 'Trámite eliminado correctamente');
    }
}

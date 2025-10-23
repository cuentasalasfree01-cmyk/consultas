<?php

namespace App\Http\Controllers;

use App\Models\CustomField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomFieldController extends Controller
{
    public function index()
    {
        $customFields = CustomField::all();
        return view('custom_fields.index', compact('customFields'));
    }

    public function create()
    {
        return view('custom_fields.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:text,number,date,select',
            'options' => 'nullable|string',
            'required' => 'boolean',
        ]);

        $data = $request->only('name', 'type', 'options', 'required');

        if ($data['type'] === 'select') {
            // Convierte las opciones separadas por coma en array y luego JSON
            $data['options'] = json_encode(array_map('trim', explode(',', $data['options'])));
        } else {
            $data['options'] = null;
        }

        CustomField::create($data);
        return redirect()->route('custom-fields.index')->with('success', 'Campo creado correctamente');
    }

    public function edit(CustomField $customField)
    {
        return view('custom_fields.edit', compact('customField'));
    }

    public function update(Request $request, CustomField $customField)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:text,number,date,select',
            'options' => 'nullable|string',
            'required' => 'boolean',
        ]);

        $data = $request->only('name', 'type', 'options', 'required');

        if ($data['type'] === 'select') {
            $data['options'] = json_encode(array_map('trim', explode(',', $data['options'])));
        } else {
            $data['options'] = null;
        }

        $customField->update($data);

        return redirect()->route('custom-fields.index')->with('success', 'Campo actualizado correctamente');
    }

    public function destroy(CustomField $customField)
    {
        $customField->delete();
        return redirect()->route('custom-fields.index')->with('success', 'Campo eliminado correctamente');
    }
}

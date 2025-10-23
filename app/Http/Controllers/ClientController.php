<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CustomField;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $customFields = CustomField::all();
        return view('clients.create', compact('customFields'));
    }

    public function store(Request $request)
    {
        // Validación campos fijos
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'country' => 'required|string|max:255',
            'id_type' => 'required|string|max:50',
            'id_number' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:30'
            // otros campos fijos si quieres incluirlos
        ]);
        Client::create($data);
        return redirect()->route('clients.index')->with('status', 'Cliente creado');


        // Validación dinámica campos personalizados
        $customFields = CustomField::all();
        foreach ($customFields as $field) {
            $key = "custom_fields.{$field->id}";
            $rules = [];

            if ($field->required) {
                $rules[] = 'required';
            } else {
                $rules[] = 'nullable';
            }

            switch ($field->type) {
                case 'text':
                    $rules[] = 'string';
                    break;
                case 'number':
                    $rules[] = 'numeric';
                    break;
                case 'date':
                    $rules[] = 'date';
                    break;
                case 'select':
                    $options = $field->options ?? [];
                    $rules[] = 'in:' . implode(',', $options);
                    break;
            }
            $request->validate([
                $key => $rules,
            ]);
        }

        // Crear cliente con campos fijos
        $client = Client::create($request->only([
            'name',
            'email',
            'phone',
            'company',
            'notes',
            'user_id'
        ]));

        // Guardar campos personalizados
        $customFieldsData = $request->input('custom_fields', []);
        foreach ($customFieldsData as $fieldId => $value) {
            if ($value !== null) {
                $client->customFieldValues()->create([
                    'custom_field_id' => $fieldId,
                    'value' => $value,
                ]);
            }
        }

        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente');
    }

    // Métodos restantes: show, edit, update, destroy
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $customFields = CustomField::all()->map(function ($field) use ($client) {
            $field->value = $client->customFieldValues()
                ->where('custom_field_id', $field->id)
                ->value('value');
            return $field;
        });

        return view('clients.edit', compact('client', 'customFields'));
    }

    public function update(Request $request, Client $client)
    {
        // Aquí puedes replicar validaciones de store y actualizar datos
        // Actualizando campos fijos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'company' => 'nullable|string',
            'notes' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Validación dinámica campos personalizados igual que en store
        $customFields = CustomField::all();
        foreach ($customFields as $field) {
            $key = "custom_fields.{$field->id}";
            $rules = [];

            if ($field->required) {
                $rules[] = 'required';
            } else {
                $rules[] = 'nullable';
            }

            switch ($field->type) {
                case 'text':
                    $rules[] = 'string';
                    break;
                case 'number':
                    $rules[] = 'numeric';
                    break;
                case 'date':
                    $rules[] = 'date';
                    break;
                case 'select':
                    $options = $field->options ?? [];
                    $rules[] = 'in:' . implode(',', $options);
                    break;
            }
            $request->validate([
                $key => $rules,
            ]);
        }

        $client->update($request->only([
            'name',
            'email',
            'phone',
            'company',
            'notes',
            'user_id'
        ]));

        // Actualizar campos personalizados
        $customFieldsData = $request->input('custom_fields', []);
        foreach ($customFieldsData as $fieldId => $value) {
            $fieldValue = $client->customFieldValues()->where('custom_field_id', $fieldId)->first();
            if ($fieldValue) {
                // Actualizar
                $fieldValue->update(['value' => $value]);
            } else {
                // Crear nuevo
                $client->customFieldValues()->create([
                    'custom_field_id' => $fieldId,
                    'value' => $value,
                ]);
            }
        }

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente');
    }
}

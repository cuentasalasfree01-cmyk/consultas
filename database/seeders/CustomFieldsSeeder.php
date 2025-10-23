<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomField;

class CustomFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomField::create([
            'name' => 'Número de pasaporte',
            'type' => 'text',
            'options' => null,
            'required' => true,
        ]);

        CustomField::create([
            'name' => 'Fecha de vencimiento',
            'type' => 'date',
            'options' => null,
            'required' => false,
        ]);

        CustomField::create([
            'name' => 'Tipo de visa',
            'type' => 'select',
            'options' => json_encode(['Turista', 'Trabajo', 'Estudio']),
            'required' => true,
        ]);
    }
}

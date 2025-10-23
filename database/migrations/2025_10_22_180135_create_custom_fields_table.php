<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // etiqueta campo
            $table->string('type'); // tipo (text, number, date, select, etc)
            $table->text('options')->nullable(); // JSON opciones para selects
            $table->boolean('required')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_fields');
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
    protected $fillable = ['client_id', 'custom_field_id', 'value'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function field()
    {
        return $this->belongsTo(CustomField::class, 'custom_field_id');
    }
}

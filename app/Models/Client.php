<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomFieldValue;

class Client extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'country',
        'id_type',
        'id_number',
        'email',
        'phone'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function procedures()
    {
        return $this->belongsToMany(Procedure::class, 'client_procedure')
            ->withPivot('percentage', 'status')
            ->withTimestamps();
    }
    public function customFields()
    {
        return $this->hasMany(CustomFieldValue::class);
    }
    public function customFieldValues()
    {
        return $this->hasMany(CustomFieldValue::class);
    }
}

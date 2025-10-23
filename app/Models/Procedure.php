<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_procedure')
            ->withPivot('percentage', 'status')
            ->withTimestamps();
    }
}

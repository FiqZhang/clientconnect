<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'id_number',
        'phone_number',
        'address',
        'notes',
    ];

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
}

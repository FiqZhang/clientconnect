<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'interaction_date', 
        'type', 
        'notes'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

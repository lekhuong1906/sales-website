<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Cart extends Model
{
    protected $connection = "mongodb";
    protected $collection = "carts";
    protected $fillable = [
        'user_id',
        'items',
    ];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = true;

    // ESTO ES LO QUE FALTA:
    // Aquí le damos permiso a Laravel para guardar datos en estas columnas
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'image' // <-- Fundamental para que deje de ser NULL
    ];
}
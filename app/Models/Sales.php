<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    /** @use HasFactory<\Database\Factories\SalesFactory> */
    use HasFactory;

    protected $fillable = [
        'product_name',
        'sale_date',
        'quantity',
        'price',
    ];

    protected $casts = [
        'sale_date' => 'date',
        'quantity' => 'integer',
        'price' => 'integer',
    ];
}

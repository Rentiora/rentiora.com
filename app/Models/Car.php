<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'cars';
    // Define the primary key
    protected $primaryKey = 'car_id';

    // Define the fields that should be cast to native types
    protected $casts = [
        'year' => 'integer',
        'price_per_day' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the fields that are dates
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Define the fillable fields
    protected $fillable = [
        'make',
        'model',
        'year',
        'availability_id',
        'description',
        'price_per_day',
        'image_url',
    ];
}
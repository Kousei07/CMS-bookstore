<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Specify the table name if necessary
    protected $table = 'product_table'; // Adjust this if your table name differs

    // Define fillable fields if applicable
    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        // Add other fields as necessary
    ];
}

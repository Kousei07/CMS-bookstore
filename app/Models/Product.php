<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product_table';

    protected $fillable = [
        'product_name', 
        'product_description', 
        'quantity', 
        'price', 
        'status'
    ];
    
    // Define the relationship to the Order model (if needed)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    
}
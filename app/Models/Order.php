<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_table'; // Set the correct table name

    protected $fillable = ['product_id', 'user_id', 'price']; // Add other fillable fields if needed

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Adjust as necessary
    }

}
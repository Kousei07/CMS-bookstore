<?php

namespace App\Http\Controllers;

use App\Models\Book; // Import the Book model
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        // Retrieve all books from the product_table
        $books = Book::all(); // Fetch all books

        // Return the view with the books
        return view('viewBooks', compact('books'));
    }
}
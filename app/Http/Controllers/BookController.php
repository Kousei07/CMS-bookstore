<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Book; 

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); 
        $products = Product::all(); 
        return view('manageBooks', compact('products')); 
        return view('manageBooks', compact('books')); 
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|in:enabled,disabled',
        ]);
    
       
        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => $request->status,
        ]);
    
        
        return redirect()->route('manage.books')->with('success', 'Book added successfully!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('edit_book', compact('book')); 
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); 
        return redirect()->route('view.books')->with('success', 'Book deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        
        $book->product_name = $request->product_name;
        $book->product_description = $request->product_description;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->status = $request->status;

        
        $book->save();

        
        return redirect()->route('view.books')->with('success', 'Book updated successfully!');
    }
    
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('showBook', compact('book')); 
    }
    public function view()
    {
        
        $books = Book::all(); 

        
        return view('viewBooks', compact('books'));
    }
}

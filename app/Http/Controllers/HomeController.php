<?php

namespace App\Http\Controllers;

use App\Models\BlogPost; // Import the BlogPost model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the 3 most recent blog posts
        $blogs = BlogPost::orderBy('created_at', 'desc')->take(3)->get();
        $blogs = BlogPost::with('user')->orderBy('created_at', 'desc')->take(3)->get();

        // Pass the $blogs variable to the view
        return view('website', compact('blogs')); 
    }
}

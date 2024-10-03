<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\Activity;
use App\Models\Product; 


class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:11',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Create new user
        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->mobile_number = $validatedData['mobile_number'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); 

        $user->save(); 

        return redirect()->route('user.login')->with('success', 'Account created successfully. Please log in.');
    }


    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    // Retrieve credentials from the request
    $credentials = $request->only('email', 'password');

    // Check if the user exists and if the account is disabled
    $user = User::where('email', $request->email)->first();

    if ($user) {
        if ($user->status === 1) {
            // Check password
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->intended('dashboard'); // Redirect to intended page after login
            }
        } else {
            // Handle the case when the account is disabled
            return back()->withErrors(['email' => 'Your account is disabled.']);
        }
    }

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('dashboard');
    }
      if (Auth::attempt($credentials)) {
        Activity::create([
            'user_id' => Auth::id(),
            'description' => 'User logged in.',
        ]);
        return redirect()->intended('dashboard');
    }

    // If authentication fails, return back with an error
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout(); 
        session()->forget('cart_' . auth()->id());
        return redirect('/login');

        return redirect()->route('user.login')->with('success', 'Logged out successfully!'); // Redirect to login with a success message
    }
    public function dashboard()
    {
        return view('userDashboard'); 
    }

    public function index()
    {
        return view('website'); 
    }

    public function showDashboard()
{
    // Fetch all products from the database

    $products = Product::all(); // Fetch all products from the database
    return view('userDashboard', ['products' => $products]);

}
}

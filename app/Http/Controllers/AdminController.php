<?php 

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\RecentActivity;

class AdminController extends Controller
{
        public function login(Request $request)
        {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/admin/dashboard');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        }
        public function dashboard()
        {
            $totalUsers = User::count();
            $totalBooks = Product::count(); 
            $cartItems = session()->get('cart', []);
            
            return view('adminDashboard', compact('totalUsers', 'totalBooks', 'cartItems'));
        }
        

        public function manageUsers()
        {
            $users = User::all();
            return view('manageUsers', compact('users'));
        }
        
        public function logout(Request $request)
        {
            Auth::logout();
            return redirect()->route('admin.login'); 
        }
        public function disableUser($id)
        {
            $user = User::findOrFail($id);
            $user->status = 0; 
            $user->save();

        
            return redirect()->route('manage.users')->with('success', 'User has been disabled.');
        }
        
        public function enableUser($id)
        {
            $user = User::findOrFail($id);
            $user->status = 1; 
            $user->save();
        
            return redirect()->route('manage.users')->with('success', 'User has been enabled.');
        }
        public function index()
        {
            $totalUsers = User::count();
            $totalPosts = BlogPost::count();
            $disabledAccounts = User::where('status', 0)->count();

            $recentActivities = RecentActivity::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

            return view('adminDashboard', compact('totalUsers', 'totalPosts', 'recentActivities'));
        }

        public function destroy($id)
{

    $user = User::findOrFail($id);

 
    if ($user->id === Auth::id()) {
        return back()->withErrors(['error' => 'You cannot delete your own account.']);
    }


    $user->delete();


    return redirect()->route('manage.users')->with('success', 'User deleted successfully.');
}
        public function managePosts()
        {
            $posts = BlogPost::with('user')->get();
            return view('managePosts', compact('posts'));
        }

        public function deleteUser($userId)
        {
            $user = User::find($userId);
            if ($user) {
                $user->delete();
        
                RecentActivity::create([
                    'activity' => "{$user->first_name} {$user->last_name} has been deleted by the admin."
                ]);
            }
        
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        
}

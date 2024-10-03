<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ViewController;


Route::get('/', function () {
    return view('website.index');
    return view('logins.user');
});
Route::get('/login', function () {
    return view('userLogin');
})->name('user.login');

Route::get('/', function () {
    return view('website');
})->name('home');

Route::get('/signup', function () {
    return view('userSignup');
})->name('user.signup');

Route::get('/admin/login', function () {
    return view('adminLogin'); 
})->name('admin.login');

Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/admin/login', function () {
    return view('adminLogin');
})->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');


Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');

Route::get('/admin/manage-users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');

Route::delete('/admin/manage-users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('manage.users');

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/manage-posts', [PostController::class, 'index'])->name('manage.posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});


Route::get('/user-dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');



Route::post('/users/{id}/disable', [AdminController::class, 'disableUser'])->name('user.disable');

Route::post('/users/{id}/enable', [AdminController::class, 'enableUser'])->name('user.enable');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('user.delete');



Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');




// new content route

Route::get('/products', [ProductController::class, 'index'])->name('books');

// Route to display a user's products (books)
Route::get('/user/{id}/products', [ProductController::class, 'userProducts'])->name('user.books');

// Route to store a new product (book)
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');
Route::post('/manage-books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/store', [BookController::class, 'store'])->name('store.book');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('add.to.cart');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::post('/cancel-order/{id}', [OrderController::class, 'cancelOrder'])->name('cancel.order');
Route::get('/edit-order/{id}', [OrderController::class, 'edit'])->name('edit.order');
Route::put('/update-order/{id}', [OrderController::class, 'update'])->name('update.order');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/order', [OrderController::class, 'createOrder'])->name('order.create');
    // other routes
});
Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders');

Route::resource('orders', OrderController::class);
Route::put('/books/{id}', [BookController::class, 'update'])->name('update.book');
Route::get('/admin/books', [BookController::class, 'index'])->name('manage.books');
// Route::get('/view-books', [ViewController::class, 'index'])->name('view.books');
Route::get('/edit-books/{id}', [BookController::class, 'edit'])->name('edit.books');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('delete.book');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit.books');
Route::get('/admin/books/create', [BookController::class, 'create'])->name('add.book');
Route::get('/admin/books/view', [BookController::class, 'view'])->name('view.books');
Route::post('/admin/books', [BookController::class, 'store'])->name('store.book');
Route::get('/admin/books/edit/{id}', [BookController::class, 'edit'])->name('edit.book');
Route::put('/admin/books/{id}', [BookController::class, 'update'])->name('update.book');
Route::delete('/admin/books/{id}', [BookController::class, 'destroy'])->name('destroy.book');
Route::get('/manage-books', [BookController::class, 'index'])->name('manage.books.index'); // To view books
Route::post('/manage-books', [BookController::class, 'store'])->name('manage.books.store'); // To handle form submission
Route::get('/manage-books', [BookController::class, 'index'])->name('manage.books');
Route::get('/books', [BookController::class, 'view'])->name('books.view');
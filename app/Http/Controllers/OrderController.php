<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product; 
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product_table,id', // Assuming product_table is the correct name
        ]);

        $product = Product::find($request->product_id);
        $product = Product::findOrFail($request->product_id);

        // Check if there is enough quantity
        if ($product->quantity > 0) {
            // Logic to add the product to the cart (e.g., create an order entry)
    
            // Decrease the product quantity
            $product->quantity--;
            $product->save();
        Order::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(), // Assuming you're using Laravel's Auth
            'price' => $product->price,
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    } else {
        return redirect()->back()->with('error', 'This product is out of stock.');

    }
    }
    public function showOrders()
    {
        $userId = auth()->id(); // Assuming you're using authentication
        $orders = Order::where('user_id', $userId)->with('product')->get(); // Make sure 'product' is the correct relationship
    
        return view('orders', compact('orders'));
    }

    public function index()
    {
        // Fetch orders for the authenticated user
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders', compact('orders'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1', // Validate quantity
    ]);

    $order = Order::findOrFail($id); // Find the order by ID
    $order->quantity = $request->quantity; // Update quantity
    $order->price = $order->product->price * $order->quantity; // Update price based on new quantity
    $order->save(); // Save the order

    return redirect()->route('orders')->with('success', 'Order updated successfully!');
}

public function destroy($id)
{
    return DB::transaction(function () use ($id) {
        // Find the order by ID
        $order = Order::findOrFail($id);

        // Retrieve the associated product
        $product = $order->product;

        // Restore the quantity of the product
        $product->quantity += $order->quantity; 
        $product->save(); 

        // Delete the order
        $order->delete();

        // Redirect back with a success message
        return redirect()->route('orders.index')->with('success', 'Order canceled successfully. Product quantity restored.');
    });
}


}


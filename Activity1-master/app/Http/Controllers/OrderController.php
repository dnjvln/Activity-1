<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $cartItems = Order::with('product')
            ->where('user_id', Auth::id())
            ->where('status', 'PendingOrder')
            ->get();

        return response()->json($cartItems);
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1'
            ]);

            $product = Product::findOrFail($request->product_id);
            $totalAmount = $product->price * $request->quantity;

            // Check if product already exists in cart
            $existingOrder = Order::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('status', 'PendingOrder')
                ->first();

            if ($existingOrder) {
                // Update quantity if product exists
                $existingOrder->quantity += $request->quantity;
                $existingOrder->total_amount = $product->price * $existingOrder->quantity;
                $existingOrder->save();
            } else {
                // Create new order if product doesn't exist
                Order::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'total_amount' => $totalAmount,
                    'status' => 'PendingOrder'
                ]);
            }

            return response()->json([
                'message' => 'Product added to cart',
                'count' => Order::where('user_id', Auth::id())
                    ->where('status', 'PendingOrder')
                    ->sum('quantity')
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart add error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to add product to cart: ' . $e->getMessage()
            ], 500);
        }
    }

    public function remove($id)
    {
        try {
            $order = Order::where('user_id', Auth::id())
                ->where('id', $id)
                ->where('status', 'PendingOrder')
                ->firstOrFail();

            $order->delete();

            return response()->json([
                'message' => 'Product removed from cart',
                'count' => Order::where('user_id', Auth::id())
                    ->where('status', 'PendingOrder')
                    ->sum('quantity')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to remove product from cart'
            ], 500);
        }
    }

    public function count()
    {
        $count = Order::where('user_id', Auth::id())
            ->where('status', 'PendingOrder')
            ->sum('quantity');
        return response()->json(['count' => $count]);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            $order = Order::where('user_id', Auth::id())
                ->where('id', $request->order_id)
                ->where('status', 'PendingOrder')
                ->firstOrFail();

            $order->quantity = $request->quantity;
            $order->total_amount = $order->product->price * $request->quantity;
            $order->save();

            return response()->json([
                'message' => 'Quantity updated successfully',
                'order' => $order
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update quantity'
            ], 500);
        }
    }

    public function checkout(Request $request)
    {
        try {
            $request->validate([
                'order_ids' => 'required|array',
                'delivery_address' => 'required|string',
                'payment_method' => 'required|in:COD,card'
            ]);

            \Log::info('Checkout request data:', $request->all());

            $orders = Order::whereIn('id', $request->order_ids)
                ->where('user_id', Auth::id())
                ->get();

            if ($orders->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'error' => 'No valid orders found'
                ], 404);
            }

            DB::beginTransaction();
            try {
                foreach ($orders as $order) {
                    $order->update([
                        'status' => 'Ordered',
                        'delivery_address' => $request->delivery_address,
                        'payment_method' => $request->payment_method
                    ]);
                }
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Order placed successfully'
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            \Log::error('Checkout error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Failed to place order: ' . $e->getMessage()
            ], 500);
        }
    }

    public function prepareOrder(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array'
        ]);

        try {
            // Only update the delivery address, keep status as PendingOrder and payment_method as NULL
            Order::whereIn('id', $request->order_ids)
                ->where('user_id', Auth::id())
                ->update([
                    'delivery_address' => Auth::user()->address
                ]);

            return response()->json(['message' => 'Order prepared successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to prepare order'], 500);
        }
    }

    public function getAllOrders()
    {
        try {
            $orders = Order::with(['user', 'product'])
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'user_id' => $order->user_id,
                        'product_id' => $order->product_id,
                        'quantity' => $order->quantity ?? 0,
                        'total_amount' => $order->total_amount ?? 0,
                        'status' => $order->status ?? 'PendingOrder',
                        'delivery_address' => $order->delivery_address,
                        'payment_method' => $order->payment_method
                    ];
                });

            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch orders'], 500);
        }
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        try {
            $request->validate([
                'status' => 'required|in:PendingOrder,Ordered'
            ]);

            $order->update([
                'status' => $request->status
            ]);

            return response()->json(['message' => 'Order status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }

    public function destroyOrder(Order $order)
    {
        try {
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete order'], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $items = json_decode($request->query('items'), true) ?? [];
            $totalAmount = $request->query('totalAmount') ?? '0.00';


            if (!empty($items)) {
                $orderIds = array_column($items, 'id');
                Order::whereIn('id', $orderIds)
                    ->where('user_id', Auth::id())
                    ->where('status', 'PendingOrder')
                    ->update([
                        'delivery_address' => Auth::user()->address,
                    ]);
            }

            return Inertia::render('Checkout/OrderPage', [
                'items' => $items,
                'totalAmount' => $totalAmount
            ]);
        } catch (\Exception $e) {
            \Log::error('Order show error: ' . $e->getMessage());
            return Inertia::render('Checkout/OrderPage', [
                'items' => [],
                'totalAmount' => '0.00',
                'error' => 'Failed to process order'
            ]);
        }
    }

    public function getCounts()
    {
        return response()->json([
            'count' => Order::count(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json([]);
        }
        
        $favorites = $user->favorites()->pluck('product_id');
        return response()->json($favorites);
    }

    public function toggle(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        
        $product = Product::findOrFail($productId);
        
        if ($user->favorites()->where('product_id', $productId)->exists()) {
            $user->favorites()->detach($productId);
            return response()->json(['status' => 'removed']);
        } else {
            $user->favorites()->attach($productId);
            return response()->json(['status' => 'added']);
        }
    }
}

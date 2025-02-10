<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Existing toggle method
    public function toggle(Request $request)
    {
        $user = auth()->user();  // Ensure the user is authenticated

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Validate the request data (product_id should be required and must exist in the products table)
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $validatedData['product_id'];

        // Check if the user has this product in their favorites already
        $exists = $user->favorites()->where('product_id', $productId)->exists();

        if ($exists) {
            $user->favorites()->detach($productId);  // Remove from favorites
            $status = 'removed';
        } else {
            $user->favorites()->attach($productId);  // Add to favorites
            $status = 'added';
        }

        // Return the updated favorites count after toggling
        return response()->json([
            'status' => $status,
            'favoritesCount' => $user->favorites()->count(),
        ]);
    }

    // New getFavoritesCount method
    public function getFavoritesCount(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Get the count of favorites for the user
        $favoritesCount = $user->favorites()->count();

        return response()->json([
            'count' => $favoritesCount,
        ]);
    }
}


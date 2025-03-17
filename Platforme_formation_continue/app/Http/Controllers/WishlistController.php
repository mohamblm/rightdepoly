<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth; // Correct import for Auth facade

class WishlistController extends Controller
{
    public function removeItem(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'item_id' => 'required|integer|exists:wishlists,id'
            ]);

            // Find and delete the item
            $item = Wishlist::where('id', $request->item_id)
                     ->where('user_id', Auth::id()) // Use Auth facade
                     ->firstOrFail();

            $item->delete();

            // Return success response with updated count
            return response()->json([
                'success' => true,
                'message' => 'Item removed successfully',
                'new_count' => Auth::user()->wishlists()->count() 
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle item not found
            return response()->json([
                'success' => false,
                'message' => 'Item not found or already removed'
            ], 404);

        } catch (\Exception $e) {
            // Handle other errors
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item: ' . $e->getMessage()
            ], 500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductSubtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Fetch all products.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $category = $request->query('category');

        $products = Product::when($category, function ($query, $category) {
            return $query->whereHas('subtype', function ($subtypeQuery) use ($category) {
                $subtypeQuery->where('TypeID', $category);
            });
        })->get();

        return response()->json($products);
    }

    /**
     * Store a newly created product.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Validate incoming data
            $validated = $request->validate([
                'ProductName' => 'required|string',
                'Description' => 'nullable|string',
                'Price' => 'required|numeric',
                'TypeID' => 'required|exists:producttypes,TypeID',
                'SubTypeID' => 'required|exists:productsubtypes,SubTypeID',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'fda_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $isAdminCreated = (Auth::user()->role === 'admin') ? 1 : 0;

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->storeAs('products', $request->file('image')->getClientOriginalName(), 'public');
            }

            $fdaImagePath = null;
            if ($request->hasFile('fda_image')) {
                $fdaImagePath = $request->file('fda_image')->storeAs('fda_images', $request->file('fda_image')->getClientOriginalName(), 'public');
            }

            Product::create([
                'name' => $validated['ProductName'],
                'description' => $validated['Description'],
                'price' => $validated['Price'],
                'subtype_id' => $validated['SubTypeID'],
                'type_id' => $validated['TypeID'],
                'image' => $imagePath,
                'fda_image' => $fdaImagePath,
                'user_id' => Auth::id(),
                'is_admin_created' => $isAdminCreated,
                'is_fda_approved' => false,
            ]);


            // Update the user's role to Pending Seller
            $user = Auth::user();
            if ($user->role === 'user') {
                $user->role = 'Pending Seller';
                $user->seller_status = true; // Mark as pending seller
                $user->save();
            }


            return response()->json(['message' => 'Product created successfully!'], 201);
        } catch (\Exception $e) {
            \Log::error('Product creation failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Product creation failed.'], 500);
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function getProductsBySubtype($subtypeId)
    {
        $products = Product::where('subtype_id', $subtypeId)->get();

        return response()->json(
            $products->map(function ($product) {
                return [
                    'id' => $product->id, // Primary ID is now being used
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'image' => $product->image,
                ];
            })
        );
    }



    /**
     * Get all products (for admin view).
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProducts(Request $request)
    {
        $category = $request->query('category');
        $products = Product::when($category, function ($query, $category) {
            return $query->whereHas('subtype', function ($subtypeQuery) use ($category) {
                $subtypeQuery->where('TypeID', $category); // Filter by TypeID
            });
        })->get();

        return response()->json($products);
    }

    /**
     * Fetch subtypes for a given TypeID.
     *
     * @param int $typeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubtypes($typeId)
    {
        $subtypes = ProductSubtype::where('TypeID', $typeId)->get(['SubTypeID as id', 'SubTypeName as name']);
        return response()->json($subtypes);
    }


    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
    }

    public function edit($id)
    {
        return Inertia::render('Admin/AddProducts/EditProduct', [
            'productId' => (int) $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product,
        ]);
    }




    /**
     * Fetch 5 products for each product type for the MainPage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMainPageProducts()
    {
        $skincareProducts = Product::where('type_id', 1)->take(5)->get()->map(function ($product) {
            $product->image_url = $product->image ? asset('storage/' . $product->image) : null;
            return $product;
        });

        $haircareProducts = Product::where('type_id', 2)->take(5)->get()->map(function ($product) {
            $product->image_url = $product->image ? asset('storage/' . $product->image) : null;
            return $product;
        });

        $makeupProducts = Product::where('type_id', 3)->take(5)->get()->map(function ($product) {
            $product->image_url = $product->image ? asset('storage/' . $product->image) : null;
            return $product;
        });

        return response()->json([
            'skincareProducts' => $skincareProducts,
            'haircareProducts' => $haircareProducts,
            'makeupProducts' => $makeupProducts,
        ]);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/products' . $this->image) : null;
    }


    public function getProductsByType(Request $request)
    {
        $typeId = $request->query('type_id', 1);

        if (!in_array($typeId, [1, 2, 3])) {
            return response()->json(['error' => 'Invalid product type ID.'], 400);
        }

        $products = Product::where('type_id', $typeId)->get()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->image ? asset('storage/' . $product->image) : null,
            ];
        });

        return response()->json($products);
    }

    public function fetchProductsBySubtype(Request $request)
    {
        $subtypeId = $request->query('subtype_id');

        if (!$subtypeId) {
            return response()->json(['error' => 'subtype_id is required.'], 400);
        }

        $products = Product::where('subtype_id', $subtypeId)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'image' => $product->image ? asset('storage/' . $product->image) : '/path/to/default-image.jpg',
                ];
            });

        return response()->json($products);
    }


    public function fetchProducts(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        // Fetch all products with eager loading for favorites to avoid N+1 issues
        $products = Product::with(['favoritedBy' => function ($query) use ($user) {
            $query->where('user_id', $user ? $user->id : null);
        }])->get();

        // Map the products with favorited status
        $mappedProducts = $products->map(function ($product) use ($user) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->image ? asset('storage/' . $product->image) : null,
                'is_favorited' => $user ? $product->favoritedBy->isNotEmpty() : false, // Check if the product is favorited by the user
            ];
        });

        return response()->json([
            'products' => $mappedProducts,
            'favoritesCount' => $user ? $user->favorites()->count() : 0, // Count the total number of favorites for the user
        ]);
    }












    public function fetchFDAProducts(Request $request)
    {
        $subtypeId = $request->query('subtype_id');

        $products = Product::when($subtypeId, function ($query, $subtypeId) {
            $query->where('subtype_id', $subtypeId);
        })
            ->where(function ($query) {
                $query->where('is_fda_approved', 1)
                    ->orWhere('is_admin_created', 1);
            })
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'image_url' => $product->image ? asset('storage/' . $product->image) : null,
                ];
            });

        return response()->json($products);
    }





    public function fetchPendingProducts()
    {
        // Fetch all products that are not FDA approved yet
        $pendingProducts = Product::where('is_fda_approved', false)
            ->whereNotNull('user_id')
            ->with('user') // Add the user relationship
            ->get()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'seller_name' => $product->user->name ?? 'Unknown Seller',
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->description,
                    'image_url' => $product->image ? asset('storage/' . $product->image) : null,
                    'fda_image_url' => $product->fda_image ? asset('storage/' . $product->fda_image) : null,
                ];
            });

        return response()->json($pendingProducts);
    }

    public function approveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->is_fda_approved = true; // Mark product as approved
        $product->save();

        // Promote the user to 'Seller' only if they are currently a 'Pending Seller'.
        $user = $product->user;
        if ($user && $user->role === 'Pending Seller') {
            $user->role = 'Seller';
            $user->save();
        }

        return response()->json(['message' => 'Product approved successfully!']);
    }


    public function fetchSellerProducts()
    {
        $sellerProducts = Product::where('is_fda_approved', false)
            ->where('is_admin_created', false)
            ->whereNotNull('user_id')
            ->with('user')
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'seller_name' => $product->user->name ?? 'Unknown Seller',
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->description,
                    'image_url' => $product->image ? asset('storage/' . $product->image) : null,
                    'fda_image_url' => $product->fda_image ? asset('storage/' . $product->fda_image) : null,
                ];
            });

        return response()->json($sellerProducts);
    }


}

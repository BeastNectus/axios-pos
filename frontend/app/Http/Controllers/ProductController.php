<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Models\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductList()
    {
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('pages.product', compact('products', 'categories', 'suppliers'));
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'qty_stock' => 'required',
            'on_hand' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'date_stock_in' => 'required',
        ]);

        $product = Product::find($request->input('product_id'));
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        $product->product_code = $request->input('product_code');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->qty_stock = $request->input('qty_stock');
        $product->on_hand = $request->input('on_hand');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->supplier_id = $request->input('supplier_id');
        $product->date_stock_in = $request->input('date_stock_in');
        $product->save();

        return back()->with('success', 'Product details updated successfully.');
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'qty_stock' => 'required',
            'on_hand' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'date_stock_in' => 'required',
        ]);

        $existingProduct = Product::where('product_code', $request->product_code)
            ->orWhere('name', $request->name)
            ->first();

        if ($existingProduct) {
            return redirect()->back()->with('error', 'Product with similar details already exists.');
        }

        Product::create([
            'product_code' => $request->product_code,
            'name' => $request->name,
            'description' => $request->description,
            'qty_stock' => $request->qty_stock,
            'on_hand' => $request->on_hand,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'date_stock_in' => $request->date_stock_in,
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function deleteProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        try {
            $product = Product::findOrFail($request->product_id);

            $product->delete();

            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete product'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Fetch products associated with the authenticated user
        $products = Product::with('user')->where('userid', $userId)->get();

        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $categories = Category::all(); // Assuming you want to fetch all categories
        return view('admin.product.create', compact('categories','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'expired_date' => 'required',
        'userid' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $file = $request->file('image');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/uploads', $fileName);

    $saveData = [
        'name' => $request->name,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'expired_date' => $request->expired_date,
        'userid' => $request->userid,
        'image' => $fileName,
    ];
    Product::create($saveData);

    try {
        // Your save logic here

        return redirect()->route('admin.product')->with('success', 'Product has been created successfully.');


    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->route('admin.product')->with('error', 'Error creating the product. Please try again.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = '';
        $editData = Product::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $fileName);
            if ($editData->image) {
                Storage::delete('public/uploads/' . $editData->image);
            }
        } else {
            $fileName = $request->old_image;
        }

        $editDataRecord = [
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'expired_date' => $request->expired_date,
            'userid' => $request->userid,
            'image' => $fileName,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.product', $id)->with('success', 'Product has been updated successfully.');
            } else {
                return redirect()->route('admin.product', $id)->with('error', 'Error updating the Product. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.product', $id)->with('error', 'Error updating the Product. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $users = Product::find($id);
            if (!$users) {
                return redirect()->route('admin.product')->with('error', 'Product not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $users->image);
            $users->delete();

            return redirect()->route('admin.product')->with('success', 'Product has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.product')->with('error', 'Error deleting the Product. Please try again.');
        }
    }
}

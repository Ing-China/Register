<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['category'] = Category::get();
          // Get the authenticated user's ID
          $userId = Auth::id();
          $category = Category::where('userid', $userId)->get();
          return view('admin.category.index', ['category' => $category]);

    }

    /**category
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
    // Pass the users to the view
        return view('admin.category.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         // dd($request->all());
         $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $userId = Auth::id(); // Get the authenticated user's ID

        $saveData = [
            'name' => $request->name,
            'description' => $request->description,
            'userid' => $userId, // Associate the category with the authenticated user
        ];

        try {
            Category::create($saveData);

            return redirect()->route('admin.category')->with('success', 'Category has been created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.category')->with('error', 'Error creating the Category. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editData = Category::find($id);
        $editDataRecord = [
            'name' => $request->name,
            'description' => $request->gendescriptionder,
            'userid' => $request->userid,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.category', $id)->with('success', 'Category has been updated successfully.');
            } else {
                return redirect()->route('admin.category', $id)->with('error', 'Error updating the Category. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.category', $id)->with('error', 'Error updating the Category. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->route('admin.category')->with('error', 'user not found.');
            }

            // Delete the banner and its associated image
            $category->delete();

            return redirect()->route('admin.category')->with('success', 'Category has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.category')->with('error', 'Error deleting the Category. Please try again.');
        }
    }
}

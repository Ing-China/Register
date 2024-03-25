<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::get();
        return view('admin.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
      $request->validate([
        'name' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'dob' => 'required',
        'email' => 'required',
        'phonenumber' => 'required',
        'password' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $file = $request->file('image');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/uploads', $fileName);

    $saveData = [
        'name' => $request->name,
        'gender' => $request->gender,
        'age' => $request->age,
        'dob' => $request->dob,
        'email' => $request->email,
        'phonenumber' => $request->phonenumber,
        'password' => $request->password,
        'image' => $fileName,
    ];
    User::create($saveData);

    try {
        // Your save logic here

        return redirect()->route('admin.users')->with('success', 'User has been created successfully.');


    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->route('admin.users')->with('error', 'Error creating the users. Please try again.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return view('admin.users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = '';
        $editData = User::find($id);
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
            'gender' => $request->gender,
            'age' => $request->age,
            'dob' => $request->dob,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => $request->password,
            'image' => $fileName,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.users', $id)->with('success', 'User has been updated successfully.');
            } else {
                return redirect()->route('admin.users', $id)->with('error', 'Error updating the user. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.users', $id)->with('error', 'Error updating the user. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $users = User::find($id);
            if (!$users) {
                return redirect()->route('admin.users')->with('error', 'user not found.');
            }

            // Delete the banner and its associated image
            Storage::delete('public/uploads/' . $users->image);
            $users->delete();

            return redirect()->route('admin.users')->with('success', 'User has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.users')->with('error', 'Error deleting the user. Please try again.');
        }
    }


}



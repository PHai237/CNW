<?php

namespace App\Http\Controllers;

use App\Models\Users1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users1 = Users1::paginate(10);
        return view('users1.index', compact('users1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users1.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|email|unique:users1,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        Users1::create($data);

        return redirect()->route('users1.index')->with('success', 'Người dùng đã được thêm thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users1 = Users1::findOrFail($id);
        return view('users1.edit', compact('users1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|email|unique:users1,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required',
        ]);

        $users1 = Users1::findOrFail($id);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $users1->update($data);

        return redirect()->route('users1.index')->with('success', 'Người dùng đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users1 = Users1::findOrFail($id);
        $users1->delete();

        return redirect()->route('users1.index')->with('success', 'Người dùng đã được xóa thành công!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'organizer_email' => 'required|email|unique:movies, organizer_email',
            'description' => 'required|max:255',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Phim đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movies = Movie::findOrFail($id);
        return view('movies.edit', compact('movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'organizer_email' => 'required|email|unique:movies, organizer_email',
            'description' => 'required|max:255',
        ]);

        $movies = Movie::findOrFail($id);
        $movies->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Phim đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movies = Movie::findOrFail($id);
        $movies->delete();

        return redirect()->route('movies.index')->with('success', 'Phim đã được xóa thành công!');
    }
}

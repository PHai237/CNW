<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Company;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $numberOfRecord = Goods::count();
        $perPage = 20;
        $numberOfPage = $numberOfRecord % $perPage == 0 ?
            (int) ($numberOfRecord / $perPage) : (int) ($numberOfRecord / $perPage) + 1;
        $pageIndex = 1;
        if ($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if ($pageIndex < 1) $pageIndex = 1;
        if ($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
        //
        $goods = Goods::orderByDesc('id')
            ->skip(($pageIndex - 1) * $perPage)
            ->take($perPage)
            ->get();
        // dd($arr);
        return view('index', compact('goods', 'numberOfPage', 'pageIndex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Goods $goods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goods $goods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goods $goods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goods $goods)
    {
        //
    }
}

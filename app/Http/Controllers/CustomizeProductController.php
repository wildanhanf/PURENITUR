<?php

namespace App\Http\Controllers;

use App\Models\Customize_Product;
use Illuminate\Http\Request;

class CustomizeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_catalog = Product::inRandomOrder()->limit(6)->get();
        return view('index', ['data' => $data_catalog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customize_Product  $customize_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Customize_Product $customize_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customize_Product  $customize_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Customize_Product $customize_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customize_Product  $customize_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customize_Product $customize_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customize_Product  $customize_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customize_Product $customize_Product)
    {
        //
    }
}

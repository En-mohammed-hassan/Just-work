<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;

class producController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return product::all();

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
    return product::create($request-> all());  }

//
    public function show(string $id)
    {
        return product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = product::find($id);
        $updated->update($request->all());
        return $updated;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return product::destroy($id);

    }
}
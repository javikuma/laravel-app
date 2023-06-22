<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();

        return [
            'success' => true,
            'data' => $data
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);
        $dataCreated = Product::create($request->all());

        return [
            'success' => true,
            'data' => $dataCreated
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);

        if (!$data) {
            return [
                'success' => false,
                'message' => 'Data not found'
            ];
        }

        return [
            'success' => true,
            'data' => $data
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return [
                'success' => false,
                'message' => 'Data not found'
            ];
        }


        $product->update($request->all());
        return [
            'success' => true,
            'data' => $product
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::destroy($id);

        if (!$data) {
            return [
                'success' => false,
                'message' => 'Data not found'
            ];
        }

        return [
            'success' => true,
            'data' => $data
        ];
    }

    /**
     * Search for name
     */
    public function search(string $name)
    {
        $data = Product::where('name', 'like', '%' . $name . '%')->get();

        return [
            'success' => true,
            'data' => $data
        ];
    }
}
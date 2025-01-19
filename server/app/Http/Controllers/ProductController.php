<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index() {
        return response()->json([
            "data" => Product::all(),
            "message" => "Success",
            "status" => 200
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
        return response()->json([
            "data" => $product,
            "message" => "Product created",
            "status" => 201
        ], Response::HTTP_CREATED);
    }

    public function show($id) {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                "data" => $product,
                "message" => "Success",
                "status" => 200
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "data" => null,
                "message" => "Product not found",
                "status" => 404
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->all());
            return response()->json([
                "data" => $product,
                "message" => "Product updated",
                "status" => 200
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "data" => null,
                "message" => "Product not found",
                "status" => 404
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                "data" => null,
                "message" => "Product deleted",
                "status" => 200
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "data" => null,
                "message" => "Product not found",
                "status" => 404
            ], Response::HTTP_NOT_FOUND);
        }
    }
}

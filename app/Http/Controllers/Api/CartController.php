<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $cartContent = (new CartRepository())->content();
        $count = (new CartRepository())->count();

        return response()->json([
            'cartContent' => $cartContent,
            'cartCount' => $count
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $product = Product::find($request->productId);
        $count = (new CartRepository())->add($product);

        return response()->json([
            'cartCount' => $count
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function decreaseQuantity(int $id)
    {
        (new CartRepository())->decreaseQuantity($id);
    }

    public function increaseQuantity(int $id)
    {
        (new CartRepository())->increaseQuantity($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $count = (new CartRepository())->delete($id);

        return response()->json([
            'count' => $count
        ]);
    }

    public function count(): JsonResponse
    {
        $count = (new CartRepository())->count();

        return response()->json([
            'count' => $count
        ]);
    }
}

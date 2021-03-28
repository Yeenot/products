<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Services\Products\GetProducts;
use App\Services\Products\UpdateProduct;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Services\Products\GetProducts $getProducts
     * @return \Illuminate\Http\Response
     */
    public function index(GetProducts $getProducts)
    {
        $products = $getProducts->execute();
        return response()->json($products);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Services\Products\UpdateProduct $updateProduct
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $updateProduct, Request $request, $id)
    {
        $updateProduct->execute($id, $request->only(['name', 'quantity', 'ingredients']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

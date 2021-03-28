<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Services\Products\GetProductsChartData;

class ProductChartController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Services\Products\GetProductsChartData $getProductsChartData
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetProductsChartData $getProductsChartData, Request $request)
    {
        $products = $getProductsChartData->execute();
        return response()->json($products);
    }
}

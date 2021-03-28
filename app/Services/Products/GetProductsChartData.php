<?php

namespace App\Services\Products;

use App\Models\Product;

class GetProductsChartData
{  
    /**
     * Execute 
     * 
     * @return \Illuminate\Database\Eloquent\Collection<App\Models\Product>
     */
    public function execute()
    {
        return Product::select(['id', 'name', 'quantity'])->get();
    }
}
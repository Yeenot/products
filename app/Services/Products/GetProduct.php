<?php

namespace App\Services\Products;

use App\Models\Product;

class GetProduct
{  
    /**
     * Execute 
     * 
     * @return \App\Models\Product
     */
    public function execute($id)
    {
        return Product::find($id);
    }
}
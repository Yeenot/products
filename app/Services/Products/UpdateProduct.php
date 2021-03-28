<?php

namespace App\Services\Products;

use App\Models\Product;

class UpdateProduct
{  
    /**
     * Execute 
     * 
     * @param int $id
     * @param array $data
     * @return void
     */
    public function execute($id, $data)
    {
        $product = Product::find($id);
        $product->update($data);
    }
}
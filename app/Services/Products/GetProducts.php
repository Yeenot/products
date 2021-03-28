<?php

namespace App\Services\Products;

use App\Models\Product;

class GetProducts
{  
    /**
     * Execute 
     * 
     * @return \Illuminate\Database\Eloquent\Collection<App\Models\Product>
     */
    public function execute()
    {
        $offset = request()->start ?? 1;
        $limit = request()->length ?? 10;
        $search = request()->search['value'] ?? null;

        // Main
        $query = Product::search(['name','sku'], $search);
        $products = $query->myPaginate(intval($offset), intval($limit))->get();
        $total =  $query->getQuery()->getCountForPagination();
        return [
            'data' => $products,
            'draw' => intval(request()->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $total
        ];
    }
}
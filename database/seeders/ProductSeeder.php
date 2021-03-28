<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Products\CrawlProducts;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * @var \App\Services\Products\CrawlProducts
     */
    protected $crawlProducts;

    public function __construct(CrawlProducts $crawlProducts)
    {
        $this->crawlProducts = $crawlProducts;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->crawlProducts->execute();
        Product::truncate();
        Product::insert($products);
    }
}

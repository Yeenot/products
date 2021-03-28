<?php

namespace App\Services\Products;

use Goutte\Client;

class CrawlProducts
{  
    /**
     * @var string
     */
    private $url = 'https://sugardad.eu/collections/available';

    /**
     * @var array
     */
    protected $properties = [
        'name' => [
            'isText' => true
        ],
        'sku',
        'price',
        'image',
        'description'
    ];

    /**
     * Execute 
     * 
     * @return array
     */
    public function execute()
    {
        $pages = 1;
        $client = new Client();

        $records = [];
        for ($page = 1; $page <= $pages; $page++ ) {
            $crawler = $client->request('GET', $this->url.'?page='.$page);

            // If you want to retrieve only page 1, just comment line 42 
            $pages = intval($crawler->filter('.load-more-products')->first()->attr('data-count-page'));

            $crawler->filter('.collection-products-grid > div > div')->each(function ($item) use (&$records) {

                // From item properties
                $info = [];
                foreach ($this->properties as $key => $property) {
                    $itemProp = (is_numeric($key)) ? $property : $key;
                    $node = $item->filter('[itemprop="'.$itemProp.'"]')->first();
                    if (is_array($property)) {
                        if (isset($property['isText']) && $property['isText'])
                            $info[$itemProp] = $node->text();
                    } else
                        $info[$itemProp] = $node->attr('content');
                }

                // From JSON data
                $data = json_decode($item->filter('.product-miniature')->first()->attr('data-json-product'), true);
                $info['quantity'] = $data['quantity'][0]['quantity'];

                $records[] = [
                    'name' => nullEmpty($info['name']),
                    'sku' => nullEmpty($info['sku']),
                    'price' => toDecimal($info['price']),
                    'image' => nullEmpty($info['image']),
                    'quantity' => toInteger($info['quantity']),
                    'ingredients' => nullEmpty(clearHtmlWhitespaces(str_replace('Inhaltsstoffe:', '', $info['description'])))
                ];
            });
        }

        return $records;
    }
}
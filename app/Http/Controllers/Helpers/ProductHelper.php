<?php
namespace App\Http\Controllers\Helpers;

use App\Product;

class ProductHelper
{
    public function __construct()
    {
        $this->helper = new Helper();
    }
    public function fetchProducts($language_id)
    {
        $products = Product::all();

        foreach ($products as $product) {
            $product['name'] = $this->helper->getName($product, $language_id);
        }

        return $products;
    }
    public function fetchProduct($product_id, $language_id)
    {
        $product = Product::find($product_id);

        if ($product === null) {
            return $product;
        }

        $product['name'] = $this->helper->getName($product, $language_id);

        return $product;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ProductHelper;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        # import "readInput" function
        include app_path() . '\functions\general.php';

        # helper class for associating clean up controller codes
        $this->helper = new ProductHelper();

    }

    public function index(Request $request)
    {
        # read params from http request
        $language_id = readInput($request->language_id, 1);

        # call helper class function to make response results
        $products = $this->helper->fetchProducts($language_id);

        # return response
        return response()->json(compact("products"), 200);

    }

    public function show(Request $request, $product_id)
    {
        #read params from http request
        $language_id = readInput($request->language_id, 1);

        #call helper class function to make response results
        $product = $this->helper->fetchProduct($product_id, $language_id);

        # return reponse with error message if no product found
        if ($product === null) {
            $message = "can not find product with product_id: $product_id";
            return response()->json(compact("message"), 400);
        }

        # return response with found product
        return response()->json(compact("product"), 200);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "oc_product";
    protected $primaryKey = "product_id";
    public $timestamps = false;

    protected $hidden = [
        'model',
        'sku',
        'ean',
        'jan',
        'isbn',
        'mpn',
        'location',
        'quantity',
        'stock_status_id',
        'manufacturer_id',
        'shipping',
        'points',
        'tax_class_id',
        'date_available',
        'weight',
        'weight_class_id',
        'length',
        'width',
        'height',
        'length_class_id',
        'subtract',
        'minimum',
        'sort_order',
        'status',
        'viewed',
        'date_added',
        'date_modified',
        'product_tags',
        'is_discount',
    ];

    public function descriptions()
    {
        return $this->hasMany('App\ProductDescription', "product_id", "product_id");
    }
}

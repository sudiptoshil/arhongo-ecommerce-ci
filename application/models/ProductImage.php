<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class ProductImage extends Eloquent{
    protected $table = 'product_image';
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

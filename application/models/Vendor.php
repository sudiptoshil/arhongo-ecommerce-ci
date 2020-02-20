<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Vendor extends Eloquent{
    protected $table = 'vendor';
    protected $guarded = [];

    public function product() {
        return $this->hasMany(Product::class, 'vendor_id', 'id');
    }

    public function brand() {
        return $this->hasMany(Brand::class, 'brand_id', 'id');
    }

}

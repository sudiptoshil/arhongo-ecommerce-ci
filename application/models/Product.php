<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent{
    protected $table = 'product';
    protected $guarded = [];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function size_color() {
        return $this->hasMany(SizeColor::class, 'product_id', 'id');
    }

    public function product_image() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}

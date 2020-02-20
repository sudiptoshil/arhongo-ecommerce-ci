<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent{
    protected $table = 'product_category';
    protected $guarded = [];


    public function subcategory() {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function product() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }
}

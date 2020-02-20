<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Subcategory extends Eloquent{
    protected $table = 'product_subcategory';
    protected $guarded = [];

    public function product() {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}

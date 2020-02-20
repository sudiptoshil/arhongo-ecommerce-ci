<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Type extends Eloquent{
    protected $table = 'product_type';
    protected $guarded = [];
   

    public function category() {
        return $this->hasMany(Category::class, 'type_id', 'id');
    }

    public function product() {
        return $this->hasMany(Product::class, 'type_id', 'id');
    }



}



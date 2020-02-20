<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class SizeColor extends Eloquent{
    protected $table = 'size_color';
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

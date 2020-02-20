<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Brand extends Eloquent{
    protected $table = 'brand_name';
    protected $guarded = [];

    public function vendor() {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

}

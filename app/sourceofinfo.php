<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sourceofinfo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sourceid', 'sourcedesc', 'status', 'created_user', 'created_time', 'last_modified_user', 'last_modified_time'
    ];
/*
    public function user()
    {
        return $this->belongsTo(User::class, 'created_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
*/
   /* public function orders(){
        return $this->hasMany(Order::class);
    }*/
}

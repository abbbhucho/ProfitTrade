<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_detail extends Model
{
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'stock_name', 'stock_quantity','stock_price','sell_stock_quantity','sell_stock_price',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'price',
        'food_id',
        'order_id'
    ];

    /**
    * Get foodOrder's order
    */
    public function food()
    {
        return $this->belongsTo(Food::Class);
    }

    /**
    * Get foodOrder's user
    */
    public function order()
    {
        return $this->belongsTo(Order::Class);
    }
}

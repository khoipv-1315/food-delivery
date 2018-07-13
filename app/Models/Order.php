<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'orders';

    protected $fillable = [
        'description',
        'date',
        'total_price',
        'user_id',
        'status',
        'create_at',
        'update_at',
    ];

    /**
    * Get order's foodOrders
    */
    public function foodOrders()
    {
        return $this->hasMany(FoodOrder::Class);
    }

    /**
    * Get order's user
    */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}

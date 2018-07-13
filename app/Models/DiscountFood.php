<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountFood extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount',
        'start_date',
        'end_date',
    ];

    /**
    * Get discoutFood's foods
    */
    public function foods()
    {
        return $this->hasMany(Food::Class, 'discount_id', 'id');
    }
}

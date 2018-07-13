<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rate',
        'content',
        'user_id',
        'food_id',
    ];

    /**
    * Get review's user
    */
    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    /**
    * Get review's food
    */
    public function food()
    {
        return $this->belongsTo(Food::Class);
    }
}

<?php 
    
return [
    'link' => [
        'avatar_folder' => 'images/avatar',
        'avatar' => '/images/avatar/',
        'food' => '/images/image/',
    ],

    'category' => [
    	'paginate' => 4,
    ],

    'top_food' => [
    	'paginate' => 6,
    ],

    'product' => [
        'is_active' => 1,
    	'is_top' => 1,
        'limit_qty' => 4,
        'index_qty' => 3,
        'default_qty' => 1,
        'no_discount' => 1,
        'description' => 100,
        'index_limit' => 60,
    ],
    'order' => [
        'default_status' => 0,
        'pending' => 0,
        'canceled' => 4,
        'confirmed' => 1,
        'delivery' => 2,
        'done' => 3,
    ],
    'user' => [
        'default_role' => 'customer',
        'default_avatar' => '1512582384.jpeg',
    ],
    'percentage' => 100,
];

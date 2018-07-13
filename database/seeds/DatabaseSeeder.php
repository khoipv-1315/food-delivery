<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'avatar' => '1512582883.jpeg',
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('123456'),
            'avatar' => '1512582883.jpeg',
            'role' => 'customer',
        ]);

        factory(App\Models\Category::class, 6)->create();
        factory(App\Models\DiscountFood::class, 10)->create();
        factory(App\Models\Food::class, 15)->create();
    }
}

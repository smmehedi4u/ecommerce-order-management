<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'role' => 'super_admin',
            'password' => bcrypt('12345678'),
            'outlet_id' => null,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
            'outlet_id' => null,
        ]);

        //create outlets

        $out1 = Outlet::create([
            'name' => 'Outlet 1',
            'location' => 'Location 1',
        ]);
        $out2 = Outlet::create([
            'name' => 'Outlet 2',
            'location' => 'Location 2',
        ]);

        // Create Outlet In-Charge users

        User::factory()->create([
            'name' => 'Outlet In-Charge',
            'email' => 'outlet1@example.com',
            'role' => 'outlet_in_charge',
            'password' => bcrypt('12345678'),
            'outlet_id' => $out1->id,
        ]);

        User::factory()->create([
            'name' => 'Outlet In-Charge',
            'email' => 'outlet2@example.com',
            'role' => 'outlet_in_charge',
            'password' => bcrypt('12345678'),
            'outlet_id' => $out2->id,
        ]);

        // Create some products
        \App\Models\Product::factory(10)->create();


        // Create some orders
        \App\Models\Order::factory(10)->create()->each(function ($order) {
            $order->items()->createMany(\App\Models\OrderItem::factory(3)->state(['order_id' => $order->id])->make()->toArray());
        });
    }
}

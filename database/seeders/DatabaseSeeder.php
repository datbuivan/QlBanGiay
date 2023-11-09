<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            TypeProductsSeeder::class,
            GendersSeeder::class,
            SizesSeeder::class,
            ColorsSeeder::class,
            DesignsSeeder::class,
            DeliversSeeder::class,
            ProductsSeeder::class,
            ProductDetailsSeeder::class,
            // ReviewsSeeder::class,
            PurchasesSeeder::class,
            // PurchaseDetailsSeeder::class,
            OrdersSeeder::class,
            // OrdersDetailsSeeder::class,
            ProductImagesSeeder::class,
        ]);
    }
}
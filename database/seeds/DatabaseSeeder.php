<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Product::truncate();
        Category::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $usersCount = 200;
        $categoriesCount = 30;
        $productsCount = 1000;
        $transactionsCount = 1000;

        factory(User::class, $usersCount)->create();
        factory(Category::class, $categoriesCount)->create();
        factory(Product::class, $productsCount)->create()->each(function ($product) {
            $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
            $product->categories()->attach($categories);
        });
        factory(Transaction::class, $transactionsCount)->create();
    }
}

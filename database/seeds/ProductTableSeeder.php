<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++)
        {
            DB::table('products')->insert([
                'name'=>Str::random(10),
                'content'=>Str::random(20),
                'avatar'=>Str::random(20),
                'price_import'=>random_int(50000,100000),
                'price_sell'=>random_int(50000,100000),
                'unit'=>'kg',
                'user_id'=>random_int(0,1),
                'category_id'=>random_int(1,5),
                'status'=>random_int(0,1)
            ]);
        }
    }
}

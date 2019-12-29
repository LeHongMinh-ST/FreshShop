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
                'origin_price'=>random_int(50000,100000),
                'sale_price'=>random_int(0,50000),
                'content'=>Str::random(20),
                'unit'=>'kg',
                'user_id'=>1,
                'category_id'=>random_int(1,5),
                'status'=>random_int(0,1)
            ]);
        }
    }
}

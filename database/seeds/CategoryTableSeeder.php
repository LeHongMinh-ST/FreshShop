<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
           'name'=>'Thịt sạch',
            'content'=>Str::random(20),
            'slug'=>'Thit-sach',
            'depth'=>1,
            'user_id'=>random_int(0,1)
        ]);

        DB::table('categories')->insert([
            'name'=>'Rau sạch',
            'content'=>Str::random(20),
            'slug'=>'Rau-sach',
            'depth'=>1,
            'user_id'=>random_int(0,1)
        ]);

        DB::table('categories')->insert([
            'name'=>'Hoa quả sạch',
            'content'=>Str::random(20),
            'slug'=>'Hoa-qua-sach',
            'depth'=>1,
            'user_id'=>random_int(0,1)
        ]);

        DB::table('categories')->insert([
            'name'=>'Thực phẩm khô',
            'content'=>Str::random(20),
            'slug'=>'Thuc-pham-kho',
            'depth'=>1,
            'user_id'=>random_int(0,1)
        ]);

        DB::table('categories')->insert([
            'name'=>'Gia vị',
            'content'=>Str::random(20),
            'slug'=>'Gia-vi',
            'depth'=>1,
            'user_id'=>random_int(0,1)
        ]);
    }
}

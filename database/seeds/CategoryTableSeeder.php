<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'slug'=>'Thit-sach',
            'depth'=>1
        ]);

        DB::table('categories')->insert([
            'name'=>'Rau sạch',
            'slug'=>'Rau-sach',
            'depth'=>1
        ]);

        DB::table('categories')->insert([
            'name'=>'Hoa quả sạch',
            'slug'=>'Hoa-qua-sach',
            'depth'=>1
        ]);

        DB::table('categories')->insert([
            'name'=>'Thực phẩm khô',
            'slug'=>'Thuc-pham-kho',
            'depth'=>1
        ]);

        DB::table('categories')->insert([
            'name'=>'Gia vị',
            'slug'=>'Gia-vi',
            'depth'=>1
        ]);
    }
}

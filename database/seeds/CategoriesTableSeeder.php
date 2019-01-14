<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Mato Grosso do Sul'
        ]);
        DB::table('categories')->insert([
            'name' => 'Economia'
        ]);
        DB::table('categories')->insert([
            'name' => 'Política'
        ]);
        DB::table('categories')->insert([
            'name' => 'Esporte'
        ]);
        DB::table('categories')->insert([
            'name' => 'Cultura'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AdvertisingCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertising_categories')->insert([
            'name' => 'Full banner 460px60px'
        ]);
        DB::table('advertising_categories')->insert([
            'name' => 'Super banner 940px100px'
        ]);
        DB::table('advertising_categories')->insert([
            'name' => 'Full banner 728px90px'
        ]);
        DB::table('advertising_categories')->insert([
            'name' => 'Banner rodape 300px100px'
        ]);
        DB::table('advertising_categories')->insert([
            'name' => 'Suquarw banner 300px250px'
        ]);
    }
}

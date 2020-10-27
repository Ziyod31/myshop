<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
    		[
    			'name' => 'Yunusabad',
    			'city_id' => '1',
    		],
    		[
    			'name' => 'Almazar',
    			'city_id' => '1',
    		],
    		[
    			'name' => 'Angren',
    			'city_id' => '2',
    		],
    		[
    			'name' => 'Chirchiq',
    			'city_id' => '2',
    		],
    	]);
    }
}

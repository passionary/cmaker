<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	
      factory(App\Request::class,3)->create()->each(function($item,$index){
      	switch($index) {
      		case 0: $type = 'book'; break;
      		case 1: $type = 'article'; break;
      		case 2: $type = 'video'; break;
      	}
      	$item->type = $type;
      	$item->save();
      });
    }
}

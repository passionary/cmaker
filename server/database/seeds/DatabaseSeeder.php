<?php

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
      $this->call(AdminsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(BooksTableSeeder::class);
      $this->call(ArticlesTableSeeder::class);
      $this->call(VideosTableSeeder::class);
      $this->call(RequestsTableSeeder::class);
    }
}

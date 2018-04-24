<?php

use Illuminate\Database\Seeder;
use App\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Book::class,50)->create();
    }
}

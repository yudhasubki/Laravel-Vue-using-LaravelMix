<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Book;

class CrudApiTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $list = $this->get('/api/web/books');
        $list->assertStatus(200);

        $create = $this->json('POST','/api/web/books/store',[
    		'books_title'=>'ES6 in Depth',
    		'books_desc'=>'lorem ipsum doler sit amat',
    		'books_quantity'=>'10'
    	]);
    	$create->assertStatus(200);

    	$book = Book::create([
    		'books_title'=>'ES6 in Depth',
    		'books_desc'=>'lorem ipsum doler sit amat',
    		'books_quantity'=>'10'
    	]);

    	$update = [
    		'books_title'=>'ES6 in Depth',
    		'books_desc'=>'lorem ipsum doler sit amat',
    		'books_quantity'=>'10'
    	];

    	$update =  $this->json('POST','/api/web/books/update/'.$book->id,$update);
    	$update->assertStatus(200);

    	$delete = $this->json('POST','/api/web/books/delete/'.$book->id);
    	$delete->assertStatus(200);


    }

    public function createExample()
    {

    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Book;
class CrudBookTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $book = Book::create([
            'books_title'=>'Javascript in Deep',
            'books_desc'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga provident dolorum amet neque a porro accusamus hic voluptatibus minus ex earum velit doloremque, enim nihil excepturi officiis distinctio. Quasi, modi?',
            'books_quantity' =>'10'
        ]);
        
        $this->assertDatabaseHas('books',[
            'books_title'=>'Javascript in Deep',
            'books_desc'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga provident dolorum amet neque a porro accusamus hic voluptatibus minus ex earum velit doloremque, enim nihil excepturi officiis distinctio. Quasi, modi?',
            'books_quantity' =>'10'
        ]);

        Book::find($book->id)->update([
            'books_title'=>'Javascript in Deep',
            'books_desc'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga provident dolorum amet neque a porro accusamus hic voluptatibus minus ex earum velit doloremque, enim nihil excepturi officiis distinctio. Quasi, modi?',
            'books_quantity' =>'12'
        ]);

        $this->assertDatabaseHas('books',[
            'books_title'=>'Javascript in Deep',
            'books_desc'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga provident dolorum amet neque a porro accusamus hic voluptatibus minus ex earum velit doloremque, enim nihil excepturi officiis distinctio. Quasi, modi?',
            'books_quantity' =>'12'
        ]);
        
        Book::destroy($book->id);

        $this->assertDatabaseMissing('books',[
            'books_title'=>'Javascript in Deep',
            'books_desc'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga provident dolorum amet neque a porro accusamus hic voluptatibus minus ex earum velit doloremque, enim nihil excepturi officiis distinctio. Quasi, modi?',
            'books_quantity' =>'12'
        ]);
    }
}

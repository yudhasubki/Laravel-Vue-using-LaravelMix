<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Support\Facades\DB;

class ApiBooksController extends Controller
{
    public function index()
    {
        $book = DB::table('books')->select('books_title','books_desc','books_quantity')->get();

        return response()->json(['data'=>$book],200);
    }

    public function store(Request $request)
    {
    	$books = Book::create($request->all());

    	return response()->json(null,200);
    }

    public function destroy($id)
    {
    	$books = Book::destroy($id);

    	return response()->json(null,200);
    }

    public function update(Request $request,$id)
    {
    	$book = Book::find($id)->update($request->all());

    	return response()->json(null,200);
    }
}

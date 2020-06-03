<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $books = Book::all();
        return view("list-book", [
            "books"=>$books,
        ]);
    }
    public function search()
    {
        $book = Book::all();
        return view("search", [
            "book"=>$book,
        ]);
    }

}

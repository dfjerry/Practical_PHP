<?php

namespace App\Http\Controllers;

use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class WebController extends Controller
{
    public function index(){
        $books = Book::all();
        return view("list-book", [
            "books"=>$books,
        ]);
    }
    public function search(Request $request)
    {
        $book1 = Book::where("title", $request->bookname)->get();
        return view("search", [
            "book1"=>$book1,
        ]);
    }
    public function newBook(){
        return view("new");
    }
    public function saveBook(Request $request){
        try {
            DB::table("books")->insert([
                "title"=>$request->get("bookname"),
                "author_id"=>$request->get("author"),
                "ISBN"=>$request->get("ISBN"),
                "pub_year"=>$request->get("pubyear"),
                "available"=>$request->get("available"),
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now(),
            ]);
        }catch (\Exception $exception){
            dd($exception);
            //return redirect()->back();//back() trở lại trang trước, ở đây là trang form
        }
        return redirect()->to("/book");
    }
    public function editBook($id){
        $books = Book::findOrFail($id);//find tra ve 1 doi tuong co id la id truyen vao, orFail tra ve fail neu ko co
        return view("edit", ["books"=>$books]);
    }
    public function updateBook($id, Request $request){
        $books = Book::findOrFail($id);
        try {
            $books->update([
                "title"=>$request->get("title"),
                "ISBN"=>$request->get("ISBN"),
                "pub_year"=>$request->get("pubyear"),
                "available"=>$request->get("available"),
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now(),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/book");
    }
    public function deleteBook($id){
        $books = Book::findOrFail($id);
        try {
            $books->delete();
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/book");
    }
}

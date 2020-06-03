<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
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
    public function newBrand(){
        return view("book.new");
    }
    public function saveBrand(Request $request){
        $request->validate([
            "title"=>"required|string|min:2|"
        ]);
        try {
            DB::table("books")->insert([//bảng categories
                "title"=>$request->get("title"),
                "ISBN"=>$request->get("ISBN"),
                "pub_year"=>$request->get("pubyear"),
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now(),
            ]);
        }catch (\Exception $exception){
            return redirect()->back();//back() trở lại trang trước, ở đây là trang form
        }
        return redirect()->to("/admin/list-brand");
    }
    public function editBrand($id){
//        $category = Category::find($id);
//        if(is_null($category))
//            abort(404);//neu category = null trả về trang 404, dòng 73 74 75 code = dòng 76, thường dùng cách thứ 2
        $brand = Brand::findOrFail($id);//find tra ve 1 doi tuong co id la id truyen vao, orFail tra ve fail neu ko co
        return view("brand.edit", ["brand"=>$brand]);
    }
    public function updateBrand($id, Request $request){
        //tra ve id
        $brands = Brand::findOrFail($id);//lấy giá trị category theo giá trị đã sửa
        //validate
        $request->validate([
            "brand_name"=> "required|min:2|unique:brands,brand_name,($id)"//truyền vào giá trị id muốn loại trừ để giống đc chứ ko unique
        ]);
        //sau khi lấy được giá trị update mới và qua khâu validator thì update vào DB, update xong redirect về list, nếu ko đc thì back lại
        try {
            $brands->update([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/admin/list-brand");
    }
    public function deleteBrand($id){
        $brands = Brand::findOrFail($id);//lấy category được truyền vào id lấy từ param
        try {
            $brands->delete();//xóa category
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/admin/list-brand");
    }
}

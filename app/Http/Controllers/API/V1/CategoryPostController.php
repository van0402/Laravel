<?php

namespace App\Http\Controllers\API\V1;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Session;

class CategoryPostController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
      $categoryPost = CategoryPost::orderBy('id', 'DESC')->paginate(2);
        return view('layouts.category.index')->with(compact('categoryPost')); // Trả về view 'layouts.category.index' với biến $categoryPost
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //echo "Create Category Post";
      return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $categoryPost = new CategoryPost();// Tạo một đối tượng mới từ model CategoryPost
       $categoryPost->title = $request->title; // Gán giá trị title từ request vào thuộc tính title
       $categoryPost->Mota = $request->Mota; // Gán giá trị Mota từ request vào thuộc tính Mota
       $categoryPost->save(); // Lưu dữ liệu vào cơ sở dữ liệu
       return redirect()->route('category.index')->with('status','Thêm Thành Công'); // Quay lại trang danh sách category với thông báo thành công

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show( $categoryPost)
      
    {
        $categoryPost = CategoryPost::find($categoryPost); // Tìm kiếm bản ghi categoryPost theo id
        return view('layouts.category.show')->with(compact('categoryPost')); // Trả về view 'layouts.category.show' với biến $categoryPost
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryPost)
    {
        $data = $request->all(); // Lấy tất cả dữ liệu từ request
        $category = categoryPost::find($categoryPost);
        $category->title = $data['title']; // Cập nhật thuộc tính title của đối tượng category
        $category->Mota = $data['Mota']; // Cập nhật thuộc tính Mota của đối tượng category
        $category->save(); // Lưu dữ liệu đã cập nhật vào cơ sở dữ liệu
        return redirect('api/v1/category')->with('status','Cập Nhật Thành Công'); // Quay lại trang danh sách category
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy( $categoryPost)
    {
        $category = categoryPost::find($categoryPost); // Tìm kiếm bản ghi categoryPost theo id
        $category->delete(); // Xóa bản ghi categoryPost
        return redirect()->back(); // Quay lại trang trước đó
    }
}

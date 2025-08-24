<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class BaivietController extends Controller
{
    //
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
      $post = post::with('category')->orderBy('id',"DESC")->get(); // Lấy tất cả các bài viết từ cơ sở dữ liệu
          return view('layouts.Post.index')->with(compact('post')); // Trả về view 'layouts.category.index' với biến $post chứa danh sách bài viết
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //echo "Create Category Post";
      $categoryPost = CategoryPost::all(); // Lấy tất cả danh mục bài viết
    return view('layouts.Post.create', compact('categoryPost'));
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = new post();
      $post->Post_Date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); // Gán ngày hiện tại vào thuộc tính Post_Date
      $post->title = $request->title; // Gán giá trị title từ request vào thuộc tính title
      $post->Views = $request->Views; // Gán giá trị views từ request vào thuộc tính views
      $post->short_desc = $request->short_description; // Gán giá trị content từ request vào thuộc tính content
      $post->decs = $request->description; // Gán giá trị content từ request vào thuộc tính content
    $post->post_category_id= $request->post_category_id; // Gán giá trị category_id từ request vào thuộc tính category_id
      if($request['image']){
        $image = $request['image'];
        $text=$image->getClientOriginalExtension(); // Lấy tên gốc của tệp hình ảnh
        $name = time().'_'.$image->getClientOriginalName(); // Tạo tên mới cho tệp hình ảnh bằng cách kết hợp thời gian hiện tại và tên gốc
        Storage::disk('public')->put($name,File::get($image)); // Lưu tệp hình ảnh vào thư mục 'public/images' với tên gốc
        $post->image = $name; // Gán tên tệp hình ảnh vào thuộc tính image của đối tượng product
      }else{
        $post->image = 'default.png'; // Nếu không có hình ảnh, gán giá trị mặc định
      }
      $post->save(); // Lưu dữ liệu vào cơ sở dữ liệu
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show( $post)
      
    {
      $post = post::find($post); // Tìm kiếm bài viết theo ID
         $categoryPost = CategoryPost::all();
    return view('layouts.Post.show', compact('categoryPost' ,'post')); // Trả về view 'layouts.Post.show' với biến $categoryPost chứa danh sách danh mục bài viết
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $post =  post::find($post); // Tìm kiếm bài viết theo ID
        $post->Post_Date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); // Gán ngày hiện tại vào thuộc tính Post_Date
      $post->title = $request->title; // Gán giá trị title từ request vào thuộc tính title
      $post->Views = $request->Views; // Gán giá trị views từ request vào thuộc tính views
      $post->short_desc = $request->short_description; // Gán giá trị content từ request vào thuộc tính content
      $post->decs = $request->description; // Gán giá trị content từ request vào thuộc tính content
    $post->post_category_id= $request->post_category_id; // Gán giá trị category_id từ request vào thuộc tính category_id
      if($request['image']){
       unlink('uploads/'.$post->image); // Xóa hình ảnh cũ nếu có
        $image = $request['image'];
        $text=$image->getClientOriginalExtension(); // Lấy tên gốc của tệp hình ảnh
        $name = time().'_'.$image->getClientOriginalName(); // Tạo tên mới cho tệp hình ảnh bằng cách kết hợp thời gian hiện tại và tên gốc
        Storage::disk('public')->put($name,File::get($image)); // Lưu tệp hình ảnh vào thư mục 'public/images' với tên gốc
        $post->image = $name; // Gán tên tệp hình ảnh vào thuộc tính image của đối tượng product
      }
      $post->save(); // Lưu dữ liệu vào cơ sở dữ liệu
      return redirect()->route('post.index')->with('status','Cập Nhật Thành Công'); // Quay lại trang danh sách bài viết với thông báo thành công
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $post)
    {
      $path = 'uploads/'; // Đường dẫn đến thư mục chứa hình ảnh
         $post = post::find($post); // Tìm kiếm bản ghi categoryPost theo id
         unlink($path.$post->image); // Xóa hình ảnh khỏi thư mục
        $post->delete(); // Xóa bản ghi categoryPost
        return redirect()->back(); // Quay lại trang trước đó
    }
  
}

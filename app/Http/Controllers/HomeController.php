<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function search(){
      $keyword = $_GET['timkiem']; // Lấy từ khóa tìm kiếm từ request
      $post = Post::with('category')->where('title', 'LIKE', '%' . $keyword . '%')->orwhere('short_desc', 'LIKE', '%' . $keyword . '%')->get(); // Tìm kiếm bài viết theo tiêu đề
    
        $category = CategoryPost::all();

                return view('pages.search')->with(compact('category', 'keyword', 'post')); // Trả về view 'pages.search' với biến $keyword và $post chứa kết quả tìm kiếm
                 
    }
    public function index()
    {
        $all_post = Post::all();
         // Lấy tất cả các bài viết từ cơ sở dữ liệu
         // Sắp xếp các bài viết theo ngày đăng giảm dần
         // Lấy 3 bài viết mới nhất
         $all_post = Post::orderBy('id', 'DESC')->paginate(3);
         // Lấy 3 bài viết có lượt xem cao nhất
        $views = Post::orderBy('Views', 'DESC')->get();
         $news_post = Post::all()->random(3);
        $category  = CategoryPost::all();
        return view('pages.home')->with(compact('category', 'all_post', 'news_post', 'views'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

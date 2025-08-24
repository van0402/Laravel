@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Cập Nhật Bài Viết
                    <a href="{{ url('/home') }}">BACK</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data"> 
                      @method('PUT')
                        @csrf

                  
                    <div class="row">
                        <div class="form-group">
                            <lable for="title">Tiêu Đề</lable>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" >
                             <lable for="title">Views</lable>
                            <input type="text" class="form-control" name="Views"  value="{{ $post->Views }}" >
                             <lable for="title">Hinh Anh</lable>
                            <input type="file" class="form-control" name="image">
                            <p> <img src="{{ asset('uploads/post/'.$post->image) }}" width="100" height="100" alt=""></p>
                            <lable for="title">Mô Tả </lable>
                            <textarea name="short_description"  class="form-control"  row="5" id="ckeditor-shortdecs" >{{ $post->short_desc }}</textarea>
                             <lable for="title">Mội Dung </lable>
                            <textarea name="description"  class="form-control"  row="15" id="ckeditor-decs" >{{ $post->decs  }}</textarea>
                             <lable for="title">Danh Mục Bài Viết </lable>
                           <select name="post_category_id" class="form-control"> 
                            @foreach($categoryPost as $key => $cate) 
                            <option {{ $cate ->id == $post ->post_category_id ? 'selected': '' }} value="{{$cate->id}}">{{ $cate->title}}</option>
                            @endforeach
                           </select>
                            <input type="submit" name="capnhatdanhmuc" class="btn btn-primary mt-2" value="Cập Nhật Danh Mục"> 
                        </div>

                </div>
                  </form>
                  <script>
    ClassicEditor
        .create(document.querySelector('#ckeditor-shortdecs'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#ckeditor-decs'))
        .catch(error => {
            console.error(error);
        });
</script>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Thêm BÀi Viết
                    <a href="{{ url('/home') }}">BACK</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data"> 
                      @method('POST')
                        @csrf

                  
                    <div class="row">
                        <div class="form-group">
                            <lable for="title">Tiêu Đề</lable>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Nhập Tiêu Đề Bài Viết">
                             <lable for="title">Lượt View</lable>
                            <input type="text" class="form-control" name="Views"  placeholder="Thêm Lượt View">
                             <lable for="title">Hinh Anh</lable>
                            <input type="file" class="form-control" name="image">
                            
                            <lable for="title">Mô Tả </lable>
                            <textarea name="short_description" class="form-control"  row="5" id="ckeditor-shortdecs" placeholder="Nhập Mô Tả Bài Viết"></textarea>
                             <lable for="title">Mội Dung </lable>
                            <textarea name="description" class="form-control"  row="15" id="ckeditor-decs" placeholder="Nhập Nội Dung Bài Viết"></textarea>
                             <lable for="title">Danh Mục Bài Viết </lable>
                           <select name="post_category_id" class="form-control"> 
                            @foreach($categoryPost as $key => $cate) 
                            <option value="{{$cate->id}}">{{ $cate->title}}</option>
                            @endforeach
                           </select>
                            <input type="submit" name="themdanhmuc" class="btn btn-primary mt-2" value="Thêm Danh Mục"> 
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

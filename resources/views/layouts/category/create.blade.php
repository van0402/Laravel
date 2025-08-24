@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa Danh Mục Bai Viết
                    <a href="{{ url('/home') }}">BACK</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{ route('category.store') }}"> 

                  
                    <div class="row">
                        <div class="form-group">
                            <lable for="title">Tiêu Đề</lable>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Nhập Tiêu Đề Bài Viết">
                              <lable for="title">Mô Tả Danh Mục </lable>
                            <textarea  class="form-control" name="Mota" id="title" placeholder="Mô Tả Danh Mục" row="5" style="resize: none"></textarea>
                            <input type="submit" name="themdanhmuc" class="btn btn-primary mt-2" value="Thêm Danh Mục"> 
                        </div>

                </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection

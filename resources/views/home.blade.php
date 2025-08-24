@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="{{ route('category.create') }}" class="btn btn-primary w-50 mb-2" >Thêm Danh Mục bài Viết</a>
                    <a href="{{ route('category.index') }}" class="btn btn-primary w-50 mb-2" >Liệt Kê Danh Mục bài Viết</a>
                    <a href="{{ route('post.create') }}" class="btn btn-primary w-50 mb-2" >Thêm  bài Viết</a>
                     <a href="{{ route('post.index') }}" class="btn btn-primary w-50 mb-2" >Liệt Kê Bài Viết</a>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

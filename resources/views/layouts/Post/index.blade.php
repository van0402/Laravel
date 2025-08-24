@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">BÀi Viết
                        <a href="{{ url('/home') }}">BACK</a>
                    </div>

                    <div class="card-body">
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tiêu Đề </th>
                                    <th>Images</th>
                                    <th>Mô Tả Ngắn</th>
                                    <th>Danh Mục</th>
                                    <th>Ngày Thêm</th>
                                    <th>Quản Lý</th>
                                    <th>Views</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php     foreach ($post as $value) { 
                                 
                                    ?>
                                    
                                <tr>
                                    <td>{{$value->title  }}</td>
                                     <td><img src="{{ asset('uploads/' . $value->image) }}" width="100"></td>
                                     <td>{!!substr($value->short_desc,0,200)!!}</td>
                                    <td>{{ optional($value->category)->title }}</td>
                                    <td>{{ $value->Post_Date }}</td>
                                    
                                      {{-- <td>{{$value->  }}</td> --}}
                                    <td>
                                    <form action="{{ route('post.destroy', [$value->id]) }}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger me-2" type="submit" name="id" value="Delete">
                                    </form>

                                    <a class="btn btn-primary me-2" href="{{ route('post.show', [$value->id]) }}" >Edit</a>
                                </td>
                                    <td>{{ $value->Views }}</td>
                                </tr>
                                
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    {{-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> --}}
                </div>
            </div>
        </div>
@endsection
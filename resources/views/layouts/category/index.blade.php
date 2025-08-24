@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Danh Mục Và BÀi Viết
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
                                    <th>Mô Tả</th>
                        
                                    <th>Quản Lý </th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                 $i = 0;
                                 @endphp
                                <?php     foreach ($categoryPost as $categories) { 
                                    $i++;
                                    ?>
                                    
                                <tr>
                                    <td>{{$categories->title  }}</td>
                                    <td>{{ $categories->Mota }}</td>
                                    
                                    <td>
                                    <form action="{{ route('category.destroy', [$categories->id]) }}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger me-2" type="submit" name="id" value="Delete">
                                    </form>

                                    <a class="btn btn-primary me-2" href="{{ route('category.show', [$categories->id]) }}" >Edit</a>
                                </td>
                                </tr>
                                
                                
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                 
   {{ $categoryPost->links('pagination::bootstrap-4') }}


                </div>
            </div>
            
        </div>
@endsection
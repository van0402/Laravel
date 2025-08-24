@extends('layout')
@section('content')
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">

					<div class="about-one">
						
						<h3>{{  $keyword }}</h3>
					</div>
					<div class="about-two">
						<a href="single.html"><img src="images/c-1.jpg" alt="" /></a>
						<p>Posted by <a href="#">Johnson</a> on 10 feb, 2015 <a href="#">comments(2)</a></p>
						<p><p></p></p>
						
						
					</div>	
					<div class="about-tre">
						
							@foreach($post as $key => $cate) 
							
							<div class="row" style="margin:10px">
							
								<h6>{{ $cate->category->title }}</h6>
								<h3>{{ $cate->title }}</h3>
								<div class="col-md-6 abt-left">
								<img with="100%" src="{{ asset('uploads/'.$cate->image) }}" 
									alt="{{ Str::slug($cate->title) }}" />
							</div>
								<p>{!! $cate->short_desc !!}</p>
								<p>{!! $cate->decs !!}</p>
								<label>Ngày đăng: {{ $cate->Post_Date }}</label>
								
							<a href="{{ route('Baiviet2.show',[$cate->id]) }}">Đọc Tiếp...</a>
						
					
							</div>
							
				
						
						@endforeach
					
						
					</div>	
				</div>
				<div class="col-md-4 about-right heading">
					
				
					
					<div class="abt-2">
		
						
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
    @endsection
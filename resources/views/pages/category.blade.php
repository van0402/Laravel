@extends('layout')
@section('content')
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">

					<div class="about-one">
						
						<h3>{{ $title_category->title }}</h3>
					</div>
					<div class="about-two">
						<a href="single.html"><img src="images/c-1.jpg" alt="" /></a>
						<p>Posted by <a href="#">Johnson</a> on 10 feb, 2015 <a href="#">comments(2)</a></p>
						<p><p>{{ $title_category->Mota }}</p></p>
						
						<div class="about-btn">
							<a href="single.html">Read More</a>
						</div>
						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
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
						<h3>Báo Mới </h3>
						
						@foreach($news_post as $key => $news)
						<a href="{{ route('Baiviet2.show',[$news->id]) }}">
							<div class="might-grid">
								<div class="grid-might">
									<img src="{{ asset('uploads/'.$news->image) }}" class="img-responsive" alt=""> 
								</div>
								<div class="might-top">
									<h4><a href="{{ route('Baiviet2.show',[$news->id]) }}"></a>{{ $news->title }}</h4>
									<p>{!! mb_substr($news->short_desc, 0, 100, 'UTF-8') !!}</p> 
									<a href="{{ route('Baiviet2.show',[$news->id]) }}">Đọc Tiếp...</a>
								</div>
								<div class="clearfix"></div>
							</div>	
							</a>		
							@endforeach	
								
					</div>
					<div class="abt-2">
						<h3>Danh Mục</h3>
						<ul>
							<li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
							<li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
							<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
							<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
							<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
							<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
							<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
						</ul>	
					</div>
					<div class="abt-2">
		
						
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>
			<div class="pagination-wrapper">
    {{           $post->links('pagination::bootstrap-4') }}
</div>
		</div>
	</div>
    @endsection
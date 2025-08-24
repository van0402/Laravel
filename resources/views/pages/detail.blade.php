@extends('layout')
@section('content')
<div class="single">
		<div class="container">
			<div class="col-md-8">
				<div class="single-top">
						<a href="#"><img class="img-responsive" src="{{ asset('uploads/'.$post->image) }}" alt=" "></a>
					<div class=" single-grid">
						<h4>{{ $post->title }}</h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i><label>Ngày đăng: {{ $post->Post_Date }}</label></span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Views</span></li>
		  					</ul>		  						
						{!! $post->decs !!}
					</div>
					<div class="comments heading">
						<h3>Comments</h3>
						
    				</div>
    				<div class="comment-bottom heading">
    					<h3>Leave a Comment</h3>
    					<form>	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
							<input type="submit" value="Send">
					</form>
    				</div>
				</div>	
				</div>
				<div class="col-md-4 ">
						<div class="abt-2 about-right heading">
						<h3>Bài Viết Liên Quan </h3>
						
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
				</div>
			</div>					
	</div>
	@endsection
  
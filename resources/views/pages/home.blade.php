@extends('layout')
@section('content')
@include('pages.banner')
<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					
						
					<div class="about-tre">
						
							@foreach($all_post as $key => $cate) 
							
							<div class="row" style="margin:10px">
							
								<h6>{{ $cate->category->title }}</h6>
								<h3>{{ $cate->title }}</h3>
								<div class="col-md-6 abt-left">
								<img with="100%" src="{{ asset('uploads/'.$cate->image) }}" 
									alt="{{ Str::slug($cate->title) }}" />
							</div>
								<p>{!! $cate->short_desc !!}</p>
							<p>{!! mb_substr($cate->decs, 0, 100, 'UTF-8') !!}</p>
								
					<a href="{{ route('Baiviet2.show',[$cate->id]) }}" class="btn btn-link p-0 fw-semibold" style="text-decoration: none;">
    Đọc Tiếp...
</a>




						
					
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
									<a href="{{ route('Baiviet2.show',[$cate->id]) }}">Đọc Tiếp...</a>
								</div>
								<div class="clearfix"></div>
							</div>	
							</a>		
							@endforeach	
								
					</div>
					<div class="abt-2">
						<h3>Xem NHIỀU </h3>
						<ul>
							@foreach($views as $key => $view)
							<li><a href="{{ route('Baiviet2.show',[$cate->id]) }}"> </a>{{ $view->title }}</li>
							
						@endforeach
						</ul>	
					</div>
					<div class="abt-2">
						<h3>New</h3>
						<div class="news">
							<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Thời tiết Hà Nội - Tomorrow.io</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f1f7;
    }
    .weather-card {
      max-width: 340px;
      margin: 40px auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.09);
      padding: 32px 28px 26px 28px;
      text-align: center;
    }
    .weather-card .city {
      font-size: 1.5em;
      font-weight: bold;
      margin-bottom: 10px;
      color: #095a9d;
    }
    .weather-card .date {
      font-size: 0.96em;
      color: #888;
      margin-bottom: 12px;
    }
    .weather-card .icon {
      font-size: 3em;
      color: #4fa7de;
      margin-bottom: 10px;
    }
    .weather-card .temp {
      font-size: 2.1em;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .weather-card .desc {
      text-transform: capitalize;
      color: #666;
      margin-bottom: 10px;
    }
    .weather-card .info {
      font-size: 1em;
      margin-top: 8px;
      color: #454545;
    }
  </style>
</head>
<body>
  <div class="weather-card" id="weather">
    Đang tải dữ liệu...
  </div>

  <script>
    const url = "https://api.tomorrow.io/v4/weather/forecast?location=21.0285,105.8542&apikey=TftKv7VAhnT4nWYUqZUNSgHCST8MhbbE";
    fetch(url)
      .then(res => res.json())
      .then(data => {
        const daily = data.timelines.daily[0];
        const date = new Date(daily.time).toLocaleDateString();
        const tempMax = daily.values.temperatureMax;
        const tempMin = daily.values.temperatureMin;
        const humidity = daily.values.humidityAvg;

        // Tạo icon đẹp theo nhiệt độ
        let icon = '<i class="fas fa-sun"></i>';
        if (tempMax < 18) icon = '<i class="fas fa-snowflake"></i>';
        else if (tempMax < 26) icon = '<i class="fas fa-cloud-sun"></i>';
        else if (humidity > 80) icon = '<i class="fas fa-cloud-showers-heavy"></i>';

        document.getElementById('weather').innerHTML = `
          <div class="city">Hà Nội</div>
          <div class="date">${date}</div>
          <div class="icon">${icon}</div>
          <div class="temp">${tempMax}°C</div>
          <div class="desc">Nhiệt độ cao nhất hôm nay</div>
          <div class="info">Thấp nhất: <b>${tempMin}°C</b> <br> Độ ẩm trung bình: <b>${humidity}%</b></div>
        `;
      })
      .catch(err => {
        document.getElementById('weather').innerText = "Không lấy được dữ liệu thời tiết.";
      });
  </script>
</body>
</html>

						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
   <div class="pagination-wrapper">
    {{ $all_post->links('pagination::bootstrap-4') }}
</div>



		
	</div>
	
     @endsection
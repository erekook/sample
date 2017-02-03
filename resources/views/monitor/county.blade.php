@extends('layouts.default')

@section('content')
<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="/css/monitor_city.css"> -->
<div class="content">

	<div class="content_left">
		<div class="content_title">
			<h1>反馈概要</h1>
		</div>

		<!-- data_row about city -->
		<div class="data_row">
			<a href="#"><img src="{{ URL::asset('images/news_img.jpg') }}" alt=""></a>
			<div class="na_detail">
				<div class="news_title">
					<h1><a href="#">资讯标题</a></h1>
				</div>
				<div class="news_tag">
					<div class="keywords">
						<a href="#">key1</a>
						<a href="#">key2</a>
						<a href="#">key3</a>
						|<span>1小时前</span>
					</div>

				</div>
			</div>
		</div>

		<div class="data_row">
			<a href="#"><img src="{{ URL::asset('images/news_img.jpg') }}" alt=""></a>
			<div class="na_detail">
				<div class="news_title">
					<h1><a href="#">资讯标题</a></h1>
				</div>
				<div class="news_tag">
					<div class="keywords">
						<a href="#">key1</a>
						<a href="#">key2</a>
						<a href="#">key3</a>
						|<span>1小时前</span>
					</div>

				</div>
			</div>
		</div>

		<div class="data_row">
			<a href="#"><img src="{{ URL::asset('images/news_img.jpg') }}" alt=""></a>
			<div class="na_detail">
				<div class="news_title">
					<h1><a href="#">资讯标题</a></h1>
				</div>
				<div class="news_tag">
					<div class="keywords">
						<a href="#">key1</a>
						<a href="#">key2</a>
						<a href="#">key3</a>
						|<span>1小时前</span>
					</div>

				</div>
			</div>
		</div>
		<!-- data_row end -->

	</div>
	<div class="content_right">
		<div class="upload">
			<div class="upload_guide">
				<h2>上传资料</h2>
				<span>注：上传的文件不要超过5M</span>
			</div>
			<form class="" action="index.html" method="post">
				<br>
				<input class="file" type="file" name="" value="">
				<br><input class="file" type="submit" name="" value="上传">
			</form>
		</div>
		<div class="other">
			<div class="other_guide">
				<h2>其他信息</h2>
			</div>

		</div>
	</div>
</div>

@endsection

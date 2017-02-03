@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/monitor.css') }}">
<div class="enter_div enter_edu">
	<div class="enter_title">
		<h1>教育局</h1>
		<a href="{{ route('monitor_city') }}"><h2>点击进入</h2></a>
	</div>
</div>

<div class="enter_div enter_country">
	<div class="enter_title">
		<h1>区县</h1>
		<a href="{{ route('monitor_county') }}"><h2>点击进入</h2></a>
	</div>
</div>

<div class="enter_div enter_school">
	<div class="enter_title">
		<h1>学校</h1>
		<a href=""><h2>点击进入</h2></a>
	</div>
</div>

@endsection

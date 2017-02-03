
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>forum</title>
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}"> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/forum.css') }}">
	<link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="../public/bootstrap/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script> -->
</head>
<body>
<div id="hdContainer">

	<div class="navigation navi-bg">
		<ul class="nav-menu">
			<li>
				<a href="/"><img src="{{ URL::asset('images/index.png') }}"></a>
			</li>
			<li>
				<a href="/forum"><img src="{{ URL::asset('images/forum.png') }}"></a>
			</li>
			<li>
				<a href="../research.php"><img src="{{ URL::asset('images/question.png') }}"></a>
			</li>
			<li>
				<a href="../upload.php"><img src="{{ URL::asset('images/upload.png') }}"></a>
			</li>
			<li>
				<a href="/contact"><img src="{{ URL::asset('images/contact.png') }}"></a>
			</li>
			<li>
				<a href="{{ url('/login') }}"><img src="{{ URL::asset('images/login.png') }}"></a>
			</li>
			<li>
				<a href="{{ url('/register') }}"><img src="{{ URL::asset('images/register.png') }}"></a>
			</li>
		</ul>

	</div>

</div>
<!-- <div class="for-bd"> -->
	<a href="{{ url('admin/forum/create') }}"><img class="forum-add" src="{{ URL::asset('images/add.png') }}"></a>
	<div class="forum-box">
		@if (count($errors) > 0)
            <div class="alert alert-danger">
                {!! implode('<br>', $errors->all()) !!}
            </div>
        @endif
		@foreach ($forums as $forum)
		<div class="forum-list">
			<img class="forum-img" src="{{ URL::asset('images/user.png') }}">
			<div class="forum-theme"><a href="{{ url('admin/forum/'.$forum->id) }}">{{ $forum->forum_subject }}</a></div>
			<!-- <div class="forum-intro">简介</div> -->
			<div class="forum-author">{{ $forum->belongsToUser->name }}</div>
			<div class="forum-time">{{ $forum->created_at }}</div>
			@can('destroy',$forum)
			<form action="{{ url('admin/forum/'.$forum->id) }}" method="POST" style="display: inline;">
        {{ method_field('DELETE') }}
       	{{ csrf_field() }}
        <button type="submit" class="btn btn-danger">删除</button>
     	</form>
			@endcan
		</div>
		@endforeach
		{!! $forums->links() !!}
	</div>

</body>
</html>

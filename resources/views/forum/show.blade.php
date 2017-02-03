@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/forum_content.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.min.css') }}">

<div class="forum-content">

	 <div class="content-left">
	 	<div class="de-nav">
	 		<ul class="clear">
	 			<li><a href="forum.php">论坛首页</a></li>
	 			<li class="fr">
	 				<span>值班版主:</span>
	 				<a href="">xxx</a>
	 			</li>
	 		</ul>
	 		<ul class="ulsm clear">
	 			<li>论坛声明：本帖由网友上传，只代表网友个人观点，转帖请注明作者及出处。删帖申请，请邮件与我们联系（邮箱：abc126.com），中介或代理机构勿扰。</li>
	 		</ul>
	 	</div>
	 	<div class="de-zw">
	 		<h1><span>{{ $forum->forum_subject }}</span></h1>
	 		<ul class="de-xx clear">
	 			<li>
	 				<a href="">
	 					<img src="{{ URL::asset('images/usericon-default.jpg') }}">
	 				</a>
	 			</li>
	 			<li>
	 				<a href=""></a>
	 			</li>
	 			<li class="fr pl">
	 				<span>评论次数:</span>
	 			</li>
	 			<li class="fr ll">
	 				<span>浏览次数：3000</span>
	 			</li>
	 			<li class="fr">
	 				<span></span>
	 			</li>

	 		</ul>
	 		<div class="de-tai">
	 			<div id="message">
	 				{{ $forum->forum_content }}
	 			</div>
	 		</div>
	 	</div>



	 	<div id="postreply" class="de-hf">
	 		<h2>网友回复</h2>
	 		    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>操作失败</strong> 输入不符合要求<br><br>
                    {!! implode('<br>', $errors->all()) !!}
                </div>
           		@endif

				@foreach ($forum->hasManyComments as $comment)
 					<dl>
			 			<dt><a href="" target="_blank"><img src="{{ URL::asset('images/userdefault.png') }}"></a></dt>
			 			<dd>
			 				<ul class="ul1 clear">
			 					<li><a href="">{{ $comment->belongsToForum->belongsToUser->name }}</a></li>
			 					<li><span>{{ $comment->created_at }}</span></li>
			 					<li class="fr">
			 						<span id="count_1"></span>
			 					</li>
			 				</ul>
			 				<div id="message11_1" class="message">
			 					<p></p>
			 					<p><strong>{{ $comment->comment_content }}</strong></p>
			 					<p></p>
			 				</div>
			 				<ul class="ul2 clear">
			 					<li class="fr">
			 						<a class="reply" href="#reply-content"><span onclick="">回复</span></a>
			 					</li>
			 				</ul>
			 			</dd>
	 				</dl>
	 			@endforeach

<!-- 	 		<div class="lt-page clear">
	 			<ul class="fl1">
	 				<li class="cur">
	 					<a href="">1</a>
	 				</li>
	 				<li><a href="">2</a></li>
	 				<li><a href="">3</a></li>
	 			</ul>
	 			<ul class="fr detail">
		 			<li><input id="jumpPage" value="GO" class="go" type="submit"></li>
		 			<li><input id="jumpPageNo" class="te" type="text"></li>
		 			<li><a href="">尾页</a></li>
		 			<li><a href="">首页</a></li>
		 			<li><a href="">></a></li>
	 				<li>
	 					<a href=""><</a>
	 				</li>
	 			</ul>
	 		</div> -->

	 	</div>

	 	 <form method='POST' action='{{ url('comment') }}'>
	 	 	{!! csrf_field() !!}
	 		<label>回复</label>
	 		<input type="hidden" name="forum_id" value="{{ $forum->id }}" >
            <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
	 		<div class="pubBtn">
	 			<input type="submit" name="submit" class="inputsub" value="发布" width="73" onclick="">
	 		</div>
	 	</form>
	 </div>
	 <div class="content-right">
	 	<div class="lt-box">
	 		<ul class="lt-rt">
	 			<h2>热帖</h2>
	 			<li><a href="" target="_blank">
	 				市教育局召开中小学教师信息技术应用能力提升工程推进会
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				开发区教师发展中心顺利通过省示范性县级教师发展中心评估验收
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				我市举行数学高考命题研讨会
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				市教育局召开中小学教师信息技术应用能力提升工程推进会
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				开发区教师发展中心顺利通过省示范性县级教师发展中心评估验收
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				我市举行数学高考命题研讨会
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				市教育局召开中小学教师信息技术应用能力提升工程推进会
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				开发区教师发展中心顺利通过省示范性县级教师发展中心评估验收
	 			</a></li>
	 			<li><a href="" target="_blank">
	 				我市举行数学高考命题研讨会
	 			</a></li>
	 		</ul>
	 	</div>

	 </div>
	 
@endsection

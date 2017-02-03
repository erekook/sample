@extends('layouts.default')
@section('title','About')

@section('content')
<link rel="stylesheet" type="text/css" href="css/contact.css">
<div class="contact_main">
	<div class="auto-logo">
		<h3>联系方式</h3>
		<p>电子邮箱: longjietan@163.com</p>
		<p>电话: 0080 000 000</p>
		<p>传真: 0080 000 000</p>
		<p>Q  Q: 25984635</p>
		<p>地址: 江苏省徐州市</p>
	</div>
	<div class="myform">
		<h3>联系我</h3>
		<form id="contactForm" action="mail/send" method="post">
			{!! csrf_field() !!}

			<textarea rows="5" cols="50" class="form-control" id="message" name="message"
			placeholder="Message" required data-validation-required-message="Please enter your message" minlength="5"
			data-validation-minlength-message="Min 5 characters" maxlength="500" style="resize:none"></textarea><br>
			<button type="submit" class="btn btn-primary">发送</button><br/>
    </form>
  </div>
</div>
@endsection

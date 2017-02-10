@extends('layouts.default')
@section('title','Home')

@section('content')

<link rel="stylesheet" href="css/slide.css">

<style>
.ck-slide { width:960px ; height: 414px; margin: 0 auto;}
.ck-slide ul.ck-slide-wrapper { height: 414px;}


</style>

<div class="ck-slide">
    <ul class="ck-slide-wrapper">
        <li>
        <a href="javascript:"><img src="images/lunbo1.jpg" alt=""></a>
        </li>
        <li style="display:none">
            <a href="javascript:"><img src="images/lunbo2.jpg" alt=""></a>
        </li>
        <li style="display:none">
            <a href="javascript:"><img src="images/lunbo3.jpg" alt=""></a>
        </li>
        <li style="display:none">
            <a href="javascript:"><img src="images/lunbo4.jpg" alt=""></a>
        </li>
      </ul>
    <a href="javascript:;" class="ctrl-slide ck-prev">上一张</a> <a href="javascript:;" class="ctrl-slide ck-next">下一张</a>
    <div class="ck-slidebox">
        <div class="slideWrap">
            <ul class="dot-wrap">
                <li class="current"><em>1</em></li>
                <li><em>2</em></li>
                <li><em>3</em></li>
                <li><em>4</em></li>
              </ul>
        </div>
    </div>

<script src="js/slide.min.js"></script>
<script>
    $('.ck-slide').ckSlide({
        autoPlay: true,//默认为不自动播放，需要时请以此设置
        dir: 'x',//默认效果淡隐淡出，x为水平移动，y 为垂直滚动
        interval:3000//默认间隔2000毫秒

    });
</script>

</div>

<div class="row">
  <div class="col-md-3 col-md-offset-1">
    div1
  </div>
  <div class="col-md-3 col-md-offset-1">
    div2
  </div>
  <div class="col-md-3 col-md-offset-1">
    div3
  </div>
</div>

@endsection

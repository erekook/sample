
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>论坛</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/forum.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('editor/themes/default/default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script charset="utf-8" src="{{ URL::asset('editor/kindeditor-min.js') }}"></script>
    <script charset="utf-8" src="{{ URL::asset('editor/lang/zh_CN.js') }}"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
                allowFileManager : true
            });

        });
    </script>
</head>
<body>
<form action="{{ url('admin/forum') }}" method="post">
{!! csrf_field() !!}
    <div class="post-main">
        <div class="post-title">
            <img src="{{ URL::asset('images/newpost.png') }}" width="25%">
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>新增失败</strong> 输入不符合要求<br><br>
                {!! implode('<br>', $errors->all()) !!}
            </div>
        @endif
        <div class="post-desc">
            <span>主题</span>
            <input class="form-control" type="text" name="forum_subject">
            <br>

        </div>
        <div class="post-content">
            <span>正文</span>
            <textarea name="content" style="width:800px;height:400px;visibility:hidden;"></textarea>
        </div>
        <!-- <div class="post-sub">
            <input type="submit" name="submit" value="提交">
        </div> -->
        <!-- <img class="forum-sub" src="{{ URL::asset('images/sub.png') }}" > -->
        <input type="submit" style="background:url('{{ URL::asset('images/sub.png') }}');width: 150px;height: 140px;border: 0" value="" />
    </div>
</form>


</body>
</html>

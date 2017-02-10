<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '徐州市基础教育质量监测与评估中心')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    @yield('scripts')
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared.messages')
        @yield('content')

      </div>
      <div class="col-md-offset-1 col-md-10">
        @include('layouts._footer')
      </div>
    </div>
    <script src="/js/app.js"></script>
  </body>
</html>

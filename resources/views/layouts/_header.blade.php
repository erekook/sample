<header>
  <div id="main" class="header">
    <div id="hdContainer">
        <div class="hd-logo clear">
            <img id="logo" src="{{ URL::asset('images/logo.png') }}">
        </div>
        <div class="navigation">
            <ul class="nav-menu">
                <li>
                    <a href="/">首页</a>
                </li>
                <li>
                    <a href="/admin/forum">论坛</a>
                </li>
                <li>
                    <a href="research.php">调查问卷</a>
                </li>
                <li>
                    <a href="{{ route('monitor') }}">质量监测</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">联系我们</a>
                </li>
            </ul>
        </div>
        <div class="col-md-offset-1 col-md-10">
          <nav>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
              @role('Admin')
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  管理员入口<b class="caret"></b>
                </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.index') }}">用户管理</a></li>
                <li><a href="{{ route('uploads') }}">文件管理</a></li>
              </ul>
              </li>
              @endrole
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{ Auth::user()->name }} <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                  <li><a href="{{ route('users.edit',Auth::user()->id) }}">编辑资料</a></li>
                  <li class="divider"></li>
                  <li>
                    <a id="logout" href="#">
                      <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                      </form>
                    </a>
                  </li>
                </ul>
              </li>
            @else
              <li><a href="{{ route('login') }}">登录</a></li>
              <li><a href="{{ route('signup') }}">注册</a></li>
            @endif
          </ul>
        </nav>
        </div>
    </div>
</div>
</header>

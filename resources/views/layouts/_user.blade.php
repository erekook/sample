<style>
  .del_form{
    float: right;
  }

  .users li{
    margin-top: 20px;
  }

</style>

<li>
  <img src="{{ $user->gravatar('80') }}" alt="{{ $user->name }}" class="gravatar"/>
  <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>

  <form action="index.html" method="post" class="city_form">
    
  </form>


  @can('destroy', $user)
      <form action="{{ route('users.destroy', $user->id) }}" method="post" class="del_form">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
      </form>
    @endcan

</li>

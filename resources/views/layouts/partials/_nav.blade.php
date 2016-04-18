<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('root_path') }}">
		  <img width="207" height="50" src="{{ asset('img/toplogo.png') }}">
		  </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('root_path') }}">Home</a></li>
        <li><a href="/articles">Articles</a></li>        
        <li><a href="/events">Events</a></li>
        <li><a href="/category">Category</a></li>       		
		<li><a href="{{ route('tag') }}">Tags</a></li>                    
        <li><a href="{{ route('mapping_path') }}">Mapping</a></li>
        <li><a href="{{ route('students_path') }}">Users</a></li>
        <li><a href="/forum">Forum</a></li>

        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-rounded" src="{{ Auth::user()->present()->profileImage(20) }}" width="20" /> {{ Auth::user()->first_name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/friends">Friends</a></li>
              <li><a href="/messages">Messages</a></li>
              <li><a href="{{ route('getPostCreate') }}" class="reload-button">Suggest Article</a></li>
              <li><a href="/eventsTypes/">Event Templates</a></li>
              <li><a href="{{ route('getPostMine') }}">My Posts</a></li>
              <li><a href="{{ route('edit_account_path') }}">Edit profile</a></li>
              <li><a href="{{ route('new_password_path') }}">Change my password</a></li>
              @if(Auth::user()->role == 'admin')
			  <li><a href="admin">Administrator</a></li>
			  @endif
              <li class="divider"></li>
              <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
            </ul>
          </li>
        @else
          <li><a href="{{ url('/auth/login') }}">Login</a></li>
          <li><a href="{{ url('/auth/register') }}">Register</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<nav class="navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"n-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Sourcerer</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
				<li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
			</ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false">
                                    User Actions
                                <span class="caret"></span>
                    </al>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                        <li><a href="/user/{{Auth::user()->id}}">My Page</a></li>
                        <li><a href="/user/{{Auth::user()->id}}/settings">My Settings</a></li>
                        <li><a href="/logout">Logout</a></li>
                        @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
          

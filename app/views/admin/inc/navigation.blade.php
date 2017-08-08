<div class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}">UMS</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/admin/users') }}">Users</a></li>
                <li><a href="{{ URL::to('/admin/groups') }}">Groups</a></li>
            </ul>
            @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello
                        {{ Auth::user()->fullname }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div><!--/.nav-collapse -->
    </div>
</div>
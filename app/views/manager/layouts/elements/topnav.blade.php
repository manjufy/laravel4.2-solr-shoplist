<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Administrator</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{{ URL::to('manager/shop')}}">Store List</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Country List</a></li>
            <li><a href="#">State List</a></li>
            <li><a href="#">Town List</a></li>
            <li><a href="{{ URL::to('manager/category')}}">Category List</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">User Management</li>
            <li><a href="#">Users</a></li>
            <li><a href="{{ URL::to('manager/logout')}}">Logout</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{ URL::to('manager/logout')}}">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

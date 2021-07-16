<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/books">IIT ISM Library</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      @if(@session()->has('student'))
        <li><a href="/books">Books</a></li>
        <li><a href="/mybooks">My Books</a></li>
        <li><a href="/profile">Profile</a></li>
        <li><a href="/logout">logout</a></li>
      @elseif(@session()->has('admin'))
        <li><a href="/books">Books</a></li>
        <li><a href="/students">Students</a></li>
        <li><a href="/addbooks">Add Books</a></li>
        <li><a href="/bookrequests">Book Requests</a></li>
        <li><a href="/bbooks">Borrowed Books</a></li>
        <li><a href="/addadmin">Add Admin</a></li>
        <li><a href="/logout">logout</a></li>
      @else
        <li><a href="/books">Books</a></li>
        <li><a href="/student_login">Student login</a></li>
        <li><a href="/admin_login">Admin login</a></li>
        <li><a href="/student_signup">signup</a></li>
      @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
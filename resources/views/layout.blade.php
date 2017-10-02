<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow, noarchive">
	<title>Jena Schmidt - Admin</title>
	<link rel="stylesheet" type="text/css" href="/packages/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/packages/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
  <script src="/packages/jquery/dist/jquery.min.js"></script>
  @yield('scripts')
  <style>
  /*
   * Global add-ons
   */

  .sub-header {
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
  }


  /*
   * Sidebar
   */

  /* Hide for mobile, show later */
  .sidebar {
    display: none;
  }
  @media (min-width: 768px) {
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 1000;
      display: block;
      padding: 20px;
      overflow-x: hidden;
      overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
      background-color: #f5f5f5;
      border-right: 1px solid #eee;
    }
  }

  /* Sidebar navigation */
  .nav-sidebar {
    margin-right: -21px; /* 20px padding + 1px border */
    margin-bottom: 20px;
    margin-left: -20px;
  }
  .nav-sidebar > li > a {
    padding-right: 20px;
    padding-left: 20px;
  }
  .nav-sidebar > .active > a {
    color: #fff;
    background-color: #428bca;
  }


  /*
   * Main content
   */

  .main {
    padding: 20px;
  }
  @media (min-width: 768px) {
    .main {
      padding-right: 40px;
      padding-left: 40px;
    }
  }
  .main .page-header {
    margin-top: 0;
  }

  .ui-sortable li {
    cursor: pointer;
  }
  .ui-sortable img {
    width: 40px;
    height: 40px;
  }
  .ui-sortable input {
    display: inline;
    width: 85%;
  }

  p.alert {
    position: relative;
    left: 95px;
  }
  .delete-icon {
    position: absolute;
    top: 28%;
    font-size: 24px;
    right: -27px;
    color: #f00;
  }
</style>
</head>
<body>
  <div class="container">
    @if(Session::has('message'))
      <p class="alert alert-info">{{ Session::get('message') }}</p>
    @elseif(Session::has('error'))
      <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    @if (Auth::check())
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li {{{ (Request::is('dashboard') ? 'class="active"' : '') }}}><a href="/dashboard">Manage Images</a></li>
              <li {{{ (Request::is('resume-edit') ? 'class="active"' : '') }}}><a href="/resume-edit">Update CV</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            @yield('content')
          </div>
        </div>
      </div>
    @else
      @yield('content')
    @endif

  </div>
</body>
</html>

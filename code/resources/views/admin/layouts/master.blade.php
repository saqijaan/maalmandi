<html lang="en">

<head>
    <meta charset="utf-8">
<title>
    Service Directory</title>

<meta http-equiv="X-UA-Compatible"
      content="IE=edge">
<meta content="width=device-width, initial-scale=1.0"
      name="viewport"/>
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Font Awesome -->
@include('admin.layouts.css')
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           Service Directory</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           Service Directory</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    </nav>
</header>



<!-- Left side column. contains the sidebar -->
@include('admin.layouts.sidebar')

<form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" style="display:none;" id="logout"><input name="_token" type="hidden" value="NY8nI0TNbqF2DiXk1JzYt7gJeuQcj1cSkPCF2bw2">
<button type="submit">quickadmin.logout</button>
</form>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @include('layouts.flash-message')
            @yield('page')
        </section>
    </div>
</div>

<form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" style="display:none;" id="logout"><input name="_token" type="hidden" value="NY8nI0TNbqF2DiXk1JzYt7gJeuQcj1cSkPCF2bw2">
<button type="submit">Logout</button>
</form>


 
@include('admin.layouts.js')


</body>
</html>
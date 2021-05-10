<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title> Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
      <!--Modal-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Toaster -->
      <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
      <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item d-none d-sm-inline-block">
                  <a href="{{route('admin.autos.index')}}" class="nav-link">Home</a>
               </li>
            </ul>
            <!-- SEARCH FORM -->
            <form action="{{route('admin.autos.search')}}" class="search">
               @csrf
               <div class="input-group w-100">
                  <input type="text" name="search" class="form-control" placeholder="Search" required>
                  <div class="input-group-append">
                     <button class="btn btn-primary" type="submit">
                     <i class="fa fa-search"></i>
                     </button>
                  </div>
               </div>
            </form>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <!-- Messages Dropdown Menu -->
               <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                           <img src="/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                           <div class="media-body">
                              <h3 class="dropdown-item-title">
                                 Brad Diesel
                                 <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">Call me whenever you can...</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                           </div>
                        </div>
                        <!-- Message End -->
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                           <img src="/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                           <div class="media-body">
                              <h3 class="dropdown-item-title">
                                 John Pierce
                                 <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">I got your message bro</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                           </div>
                        </div>
                        <!-- Message End -->
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                           <img src="/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                           <div class="media-body">
                              <h3 class="dropdown-item-title">
                                 Nora Silvester
                                 <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">The subject goes here</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                           </div>
                        </div>
                        <!-- Message End -->
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                  </div>
               </li>
               <!-- Notifications Dropdown Menu -->
               <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <span class="dropdown-item dropdown-header">15 Notifications</span>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                     <i class="fas fa-envelope mr-2"></i> 4 new messages
                     <span class="float-right text-muted text-sm">3 mins</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                     <i class="fas fa-users mr-2"></i> 8 friend requests
                     <span class="float-right text-muted text-sm">12 hours</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                     <i class="fas fa-file mr-2"></i> 3 new reports
                     <span class="float-right text-muted text-sm">2 days</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                  </div>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('home')}}" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">AUTOSCOUT</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="" class="d-block">Admin</a>
                  </div>
               </div>
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                     <li class="nav-item">
                        <a href="#" class="nav-link active">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-copy"></i>
                           <p>
                              AUTO
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">2</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{route('admin.autos.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>AUTOS</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{route('admin.autos.create')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add New AUTO</p>
                              </a>
                        </ul>
                     </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-copy"></i>
                           <p>
                              TAGS
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">2</span>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                         <li class="nav-item">
                              <a href="{{route('admin.tags.index')}}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Tag</p>
                              </a>
                          </ul>
                       </li>
                     </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
         <div class="container" style="margin-top:10px;">
            @yield('content')
         </div>
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
      </div>
      <!--JQUERY DROPDOWN -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <!-- AdminLTE App -->
      <script src="/dist/js/adminlte.js"></script>
      <!--Toaster-->
      <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
      <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
         {!! Toastr::message() !!}
   </body>
</html>
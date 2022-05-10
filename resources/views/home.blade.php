<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sikika</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="Admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="Admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="Admin/plugins/summernote/summernote-bs4.min.css">

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
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
        </a>
        
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img"  src="https://konza.softwareske.net/assets/admin/img/160x160/img1.jpg" alt="Image Description" style="width:30px;height:30px;border-radius:100px" >
                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
                
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <div class="media align-items-center">
                        <div class="avatar avatar-sm avatar-circle mr-2">
                            <img class="avatar-img"  src="https://konza.softwareske.net/assets/admin/img/160x160/img1.jpg" alt="Image Description" style="width:30px;height:30px;border-radius:100px">
                        </div>
                        <div class="media-body">
                            <span class="card-text">{{Auth::user()->email}}</span>
                        </div>
                    </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <p>My Settings</p>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <p>Create Users</p>
          </a>
          <div class="dropdown-divider"></div>

          <div class="row p-2">
              <div class="col-md-4">
              <h5 style=""><a class="h5" href="{{url('profile')}}">Profile</a></h5>

              </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                  <h5 style="float:right">
                        <!-- Authentication Links -->
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                  @csrf
                                  <input type="submit" style="border:unset;" value="Sign Out">
                              
                              </form>
                          </h5>

                  </div>
                  </div>
         
                  </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                  </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="" class="brand-link">

      <img src="./assets/image/logo.png" alt="Logo" class="brand-image img-circle elevation-3 bg-light" style="opacity: .8;border-radius:100px;width:35px;height:40px">
      <span class="brand-text font-weight-light">Konza</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img class="img-circle elevation-2" alt="User Image" src="https://st2.depositphotos.com/1104517/11965/v/600/depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg">

        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

    
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('/home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li> 

          <li class="nav-header"></li>
          <li class="nav-header "> BUSSINESS SECTION</li> 

                 <li class="nav-item">
            <a href="{{route('user_list.index')}}" class="nav-link">
              
            <i class="nav-icon fa fa-users"></i>
              <p>
            Registered Users          
                 </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="{{route('survey.index')}}" class="nav-link">
            
            <!-- <a href="" class="nav-link"> -->

            <i class="nav-icon fa fa-comment"></i>
              <p>
                Survey / Responses
              </p>
            </a>
          </li>

          <li class="nav-header"></li>

      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    @section('title')

<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
  
         <h1><i class="fa fa-bar-chart"></i> Dashboard Statistics</h1>
   
     
    </div><!-- /.col -->
    <div class="col-sm-6">
     
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@show

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    @section('content')
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3>1</h3>

                <p>Registered Users</p>
              </div>
              
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>6</h3>

          <p>Messages</p>
              
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>2</h3>

              <p>Total Surveys</p>
             
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3>2</h3>

            <p>Participated Surveys</p>
             
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      @show
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

  <p>&copy;Konza Application Portal. Konza Technopolis</p>

  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="Admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="Admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="Admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="Admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="Admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="Admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="Admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="Admin/plugins/moment/moment.min.js"></script>
<script src="Admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="Admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Admin/dist/js/pages/dashboard.js"></script>

<script>
    $('body').on('change', '.question-type', function(){
    var minmaxhtml ='<div class="my-2" ><div class="row"><div class="col-md-6"><input type="number" class="form-control" name="rate[]" placeholder="Min Rating"></div><div class="col-md-6"><input type="number" class="form-control" name="rate[]" placeholder="Max Rating"></div></div></div>' ;
    if( $(this).val() == 'rating'){
        $('#datafields').css("display", "block");
        $('#datafields').html(minmaxhtml);
        $('#datafieldsedit').css("display", "block");
        $('#datafieldsedit').html(minmaxhtml);
        
        $('.more_choices').css("display","none");
        $('.more_selections').css("display","none");

    }else if($(this).val() == 'choice'){

        $('.more_choices').css("display","block")
      $('.more_selections').css("display","none")
        $('#datafields').css("display","none")
        $('#datafieldsedit').css("display","none")

    } else if($(this).val() == 'select'){
      
      $('.more_selections').css("display","block")
      $('.more_choices').css("display","none")
        $('#datafields').css("display","none")
        $('#datafieldsedit').css("display","none")

    }
    
    else{
        $('#datafields').css("display", "none");
        $('#datafieldsedit').css("display", "none");
        $('.more_choices').css("display","none")
      $('.more_selections').css("display","none")


    }
    
});
//mytextchoices
    var mtText='<div class="input-group mb-3 " ><input class="col-md-10" placeholder="Add more choices" type="text" name="mytextchoices[]" class="form-control"><div class="input-group-append"><button class="btn btn-danger remove_field" type="button"><i class="fa fa-minus"></i></button></div></div>'
        
    $(document).ready(function() {
    var max_fields      = 10; 
    var wrapper   		= $(".input_fields_wrap");
    var plus_button      = $(".add_field_button"); 

    var x = 1;
    $(plus_button).click(function(e){
    e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append(mtText); 
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
        })
    });
//mytextchoices

//select
var mtSelect='<div class="input-group mb-3 " ><input class="col-md-10" placeholder="Add more option values" type="text" name="select[]" class="form-control"><div class="input-group-append"><button class="btn btn-danger remove_select_field" type="button"><i class="fa fa-minus"></i></button></div></div>'
        
        $(document).ready(function() {
        var max_fields      = 10; 
        var wrapper   		= $(".input_fields_select_wrap");
        var plus_button      = $(".add_select_field_button"); 
    
        var x = 1;
        $(plus_button).click(function(e){
        e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append(mtSelect); 
            }
        });
    
        $(wrapper).on("click",".remove_select_field", function(e){ 
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
        });
    //select

</script>
</body>
</html>

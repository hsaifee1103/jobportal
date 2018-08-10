
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Job Portal</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.19/features/searchHighlight/dataTables.searchHighlight.css">
   <!-- Custom -->
    <link rel="stylesheet" href=" <?= base_url('css/AdminLTE.min.css') ?> ">
    <link rel="stylesheet" href=" <?= base_url('css/_all-skins.min.css') ?> ">
    <link rel="stylesheet" href=" <?= base_url('css/custom.css') ?> ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
      .nav li a ,.navbar-brand
      {
        color: #fff!important;
      }
    </style>
  </head>
  <body>
    <header>
             <nav class="navbar navbar-default " id="myHeader" style="background-color: #00a65a;color:">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= site_url('homecontroller') ?>">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?= site_url('homecontroller/search') ?>">Find Jobs</a></li>
              <li><a href="<?= site_url('homecontroller/Reg_as') ?>">Register</a></li>
              <li><a href="<?= site_url('homecontroller/login_as') ?>">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <script type="text/javascript">
      window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("navbar-fixed-top");
  } else {
    header.classList.remove("navbar-fixed-top");
  }
}
    </script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="public/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="public/assets/img/favicon.png">
  <title>
    app taller automotriz
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="public/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="public/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="public/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <div  class="navbar-brand m-0" >
      <img src="public/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <a href="?controlador=inicio&accion=principal">
        <span class="ms-1 font-weight-bold text-white"> app taller automotriz</span></a>
      </div>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "secretaria") { ?>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="?controlador=clientes&accion=principal">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home</i>
            </div>
            <span class="nav-link-text ms-1">clientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?controlador=coches&accion=index">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">directions_car</i>
            </div>
            <span class="nav-link-text ms-1">coches</span>
          </a>
        </li>
        <?php } ?>
        <?php if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "cliente" || $_SESSION["rol"] == "mecanico" ) { ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="?controlador=revision&accion=principal">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">handyman</i>
            </div>
            <span class="nav-link-text ms-1">revisiones</span>
          </a>
        </li>
        <?php } ?>
        <?php if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ) {?>
        <li class="nav-item">
          <a class="nav-link text-white" href="?controlador=trevision&accion=principal">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">build</i>
            </div>
            <span class="nav-link-text ms-1">Ttipo de revisiones</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        </nav>
        <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">
                  <?php
                    if(isset($_SESSION["id"])){
                      $a= $_SESSION["nombres"]." ".$_SESSION["apellidos"]." ".
                      "[".$_SESSION["rol"]."]";
                      ;
                    }
                    echo "<b style='color:black'> $a</b>";
                  ?>
                 </span>
              </a>
            </li>
            <a href="?controlador=clientes&accion=salir" style="color:black"><b>salir</b></a>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
                
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
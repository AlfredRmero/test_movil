<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal Afiliados</title>

  <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="backgroundWhiteOscuro aLogo" href="#">
        <img src="<?php echo base_url();?>images/lm.png" class="imgLogo">
      </a>

      <a class="navbar-brand mr-1" href="#">Portal Afiliados</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <label class="colorWhite">Propietario: <?php echo $propietario['nombreCorto'] ?></label>
      </div>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle colorWhiteOscuro"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" id="btnCerrarSesion">Cerrar Sesion</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link MenuLink" href="#" id="MenuDashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Resumen</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Consultas</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Alertas:</h6>
            <a class="dropdown-item MenuLink" href="#" id="MenuVenciVehiculos">Venci. Vehiculos</a>
            <a class="dropdown-item MenuLink" href="#" id="MenuViajesPerdidos">Viajes Perdidos</a>
            <a class="dropdown-item MenuLink" href="#" id="MenuRecaudoDiario">Recaudo Diario</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Consolidados:</h6>
            <a class="dropdown-item MenuLink" href="#" id="MenuDescuTimbradas">Descu. Timbradas</a>
            <a class="dropdown-item MenuLink" href="#" id="MenuIngresos">Ingresos</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link MenuLink" href="#" id="MenuGraficas">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Graficas</span>
          </a>
        </li>
      </ul>

      <div id="content-wrapper" class="padding0">

        <div class="container-fluid padding0" style="height: 90vh">

            <div class="height98porciento" id="divIframe">
              <iframe src="index.php/c_general/vstDashboard" class="width100porciento height100porciento" frameborder="0" vspace="0" hspace="0" marginwidth="0" marginheight="0" /></iframe>
            </div>

        </div>

        <footer class="sticky-footer height40px">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span id="spanPropietario"><?php echo $propietario['nombreCorto'] ?></span>
            </div>
          </div>
        </footer>

      </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

  <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SWEET ALERTS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

  <script src="<?php echo base_url();?>js/scripts.js"></script>
  <script src="<?php echo base_url();?>js/app.js"></script>

  </body>

</html>

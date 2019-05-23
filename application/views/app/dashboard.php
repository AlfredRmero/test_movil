<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

  <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"">
  <link href="<?php echo base_url();?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <div id="wrapper">
      <div id="content-wrapper" class="paddingBottom20">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Vista general</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-bell"></i>
                  </div>
                  <div class="mr-5" id="divAlarmasB">- Alarmas Basicas</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">Ver mas</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-exclamation-triangle"></i>
                  </div>
                  <div class="mr-5" id="divAlarmasC">- Alarmas Criticas</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">Ver mas</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Data grafica</div>
            <div class="card-body">
                <canvas id="myAreaChart" class="chartResize" width="100%" height="30"></canvas>
            </div>			
            <div class="card-footer small text-muted">Actualizado al instante</div>
          </div>
		  
        </div>

      </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables/dataTables.bootstrap4.js"></script>

    <script src="<?php echo base_url();?>js/scripts.js"></script>
    <script src="<?php echo base_url();?>js/functionsUtiles.js"></script>
    <script src="<?php echo base_url();?>js/app/dashboard.js"></script>

  </body>

</html>

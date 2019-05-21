<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recaudo Diario</title>

  <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="https://jqwidgets.com/public/jqwidgets/styles/jqx.base.css" rel="stylesheet">
  <link href="https://jqwidgets.com/public/jqwidgets/styles/jqx.material.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

  

  </head>

  <body id="page-top">

    <div id="wrapper">
      <div id="content-wrapper" class="paddingBottom0">

        <div class="container-fluid" style="height: 90vh">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Recaudo Diario</li>
          </ol>
          
          <div class="row">
            <div class="col-sm-5 col-md-4">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Fecha: </div>
                  </div>
                  <input type="date" id="inpDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
                </div>  
            </div>
            <div class="col-sm-3">
              <button type="button" class="btn btn-primary width100porciento" id="btnCargar"><i class="fas fa-search"></i> Cargar</button>
            </div>
          </div>

          <div class="table-responsive height78porciento marginTop10px">
              <div id="gridDatos"></div> 
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
    <script src="<?php echo base_url();?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="https://jqwidgets.com/public/jqwidgets/jqx-all.js"></script>
    
    <script src="<?php echo base_url();?>js/scripts.js"></script>
    <script src="<?php echo base_url();?>js/functionsUtiles.js"></script>
    <script src="<?php echo base_url();?>js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url();?>js/consultas/recaudo_diario.js"></script>




  </body>

</html>

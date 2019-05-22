<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mapa</title>

  <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="https://jqwidgets.com/public/jqwidgets/styles/jqx.base.css" rel="stylesheet">
  <link href="https://jqwidgets.com/public/jqwidgets/styles/jqx.material.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">
  
  <style>
    .labels {
        color: red;
        background-color: white;
        font-family: "Lucida Grande", "Arial", sans-serif;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        width: 40px;     
        border: 2px solid black;
        white-space: nowrap;
        border-radius: 10pt;
      }
  </style>
  
  </head>

  <body id="page-top">

    <input id="inpVehiculo" type="text" class="form-control input-sm btnFloatMap z-index200 borderRadius7pt" style="color:black; font-size: 15px; width: 110px;" placeholder="Vehiculo"/> 
    <button id="btnBusqueda" type="button" class='btn-floating btn btn-default btn-sm btnFloatMap paddingLaterales12px backgroundBlue z-index200 borderRadius7pt' style="left: 130px; float:left; color:white; padding: 7px;">Buscar</button>  

    <div id="googleMap" style="width:100%;height:100vh;"></div>



    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url();?>vendor/jqx-all.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=geometry&key=AIzaSyCTmzPsi_V7wWDAqSsT_59EEH0jYghx8zU"></script>
    <script src="<?php echo base_url();?>vendor/markerwithlabel.js"></script>
    <!-- SWEET ALERTS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <script src="<?php echo base_url();?>js/scripts.js"></script>
    <script src="<?php echo base_url();?>js/functionsUtiles.js"></script>
    <script src="<?php echo base_url();?>js/app/mapa.js"></script>


  </body>

</html>

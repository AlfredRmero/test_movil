<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - PORTAL</title>

    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

  </head>

  <body class="bg-dark">


    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header textCenter fontSize25px">Iniciar sesion</div>
        <div class="card-body">
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" id="inputCedula" class="form-control" placeholder="Cedula" autofocus="autofocus" autocomplete="off">
                <label for="inputCedula">Cedula</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" autocomplete="new-password">
                <label for="inputPassword">Contraseña</label>
              </div>
            </div>
            <a class="btn btn-primary btn-block colorWhite" id="btnlogin">Ingresar</a>
        </div>
      </div>
    </div>


   <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- SWEET ALERTS -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.2/dist/sweetalert2.all.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

   <script src="<?php echo base_url();?>js/login.js"></script>

  </body>
</html>

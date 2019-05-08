<?php require_once("class/class.php");

if (!isset($_SESSION['k_username'])) {
  session_start();
  ?>
  <SCRIPT LANGUAGE="javascript">
    location.href = "404.html";
  </SCRIPT><?php
}

  $conecta = new Conectar();
  $con =  $conecta->conecta();
  $reg = new Registros();
  
  if (isset($_POST["guardar"]) and $_POST["guardar"] == "si") {
    //Carácteres para la contraseña
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    //Reconstruimos la contraseña segun la longitud que se quiera
    for ($i = 0; $i < 9; $i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str, rand(0, 62), 1);
    }
    
    $reg->registerUser($_POST["name_user"], $_POST["email_user"], $_POST["age_user"], $_POST["phone_user"], $_POST["address_user"], $_POST['sector'], $_POST['tip_user'], $password);
    exit;
  }

  $list = $reg->listTip();
  $sector = $reg->listSector();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Consol - Registro de usuario</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "include/sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "include/topbar.php" ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Registro de Usuario</h1>
          <form action="register_user.php" method="post">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="name_user" name="name_user" placeholder="">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email_user" name="email_user" placeholder="">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Edad</label>
                    <input type="text" class="form-control" id="age_user" name="age_user" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" id="phone_user" name="phone_user" placeholder="">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" id="address_user" name="address_user" placeholder="">
                  </div>
                </div>
                <!-- <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password_user" name="password_user" placeholder="">
                  </div>
                </div> -->
              </div>
              <hr>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Sector</label>
                    <select name="sector" class="form-control">
                      <option value="0">--</option>
                      <?php
                      for ($i = 0; $i < count($sector); $i++) {
                        echo '<option value=' . $sector[$i]['sector_number'] . '">' . $sector[$i]['sector_number'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Tipos</label>
                    <select name="tip_user" class="form-control">
                      <option value="0">--</option>
                      <?php
                      for ($i = 0; $i < count($list); $i++) {
                        echo '<option value=' . $list[$i]['id_tip'] . '">' . $list[$i]['tip_name'] . '</option>';
                      }
                      ?>
                    </select>

                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">

                  </div>
                </div>
              </div>
              <input type="hidden" name="guardar" id="guardar" value='si'>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include "include/modal.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
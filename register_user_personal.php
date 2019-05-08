<?php
require_once("class/class.php");

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
$mensager = '';

if (isset($_POST["guardar"]) and $_POST["guardar"] == "si") {

  if($_POST["name_user"] == '' || $_POST["phone_user"] == '' || $_POST["address_user"] == '' || $_POST["age_user"] == '' || $_POST["status_civil"] == '' ||  $_POST['sector'] == '0' || $_POST['supervisor'] == '0' || $_POST['lideres'] == '0'){
    $mensager = "<div class='alert alert-danger' role='alert'>Por favor, rellene los campos.</div>";

  }else{
    $reg->registerPersonal($_POST["name_user"], $_POST["phone_user"], $_POST["address_user"], $_POST["age_user"], $_POST["status_civil"], $_POST['pray_user'], $_POST['name_guest_user'], $_POST['phone_guest_user'], $_POST['comment_guest_user'], $_POST['sector'], $_POST['supervisor'], $_POST['lideres'],$_SESSION['id']);
    exit;
  }

  
}
$sector = $reg->listSector();
$super = $reg->listSupervisor();
$lider = $reg->listLider();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Consol - Registro de Personal</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800">Registro de Personal</h1>
          <?php echo $mensager; ?>
          <form action="register_user_personal.php" method="post">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Nombre <span class="star">*</span></label>
                    <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Nombre del Creyente">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Teléfono <span class="star">*</span></label>
                    <input type="text" class="form-control" id="phone_user" name="phone_user" placeholder="Número telefónico del Creyente">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Dirección <span class="star">*</span></label>
                    <input type="text" class="form-control" id="address_user" name="address_user" placeholder="Dirección del Creyente">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Edad  <span class="star">*</span></label>
                    <input type="text" class="form-control" id="age_user" name="age_user" placeholder="Edad del Creyente">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Estado Civil  <span class="star">*</span></label>
                    <select class="form-control" id="status_civil" name="status_civil">
                      <option value="Soltero(a)">Soltero(a)</option>
                      <option value="Casado(a)">Casado(a)</option>
                      <option value="Divorciado(a)">Divorciado(a)</option>
                      <option value="Unión Libre">Unión Libre</option>
                      <option value="Viudo(a)">Viudo(a)</option>
                      <option value="Comprometido(a)">Comprometido(a)</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Motivo de Oración <span class="star">*</span></label>
                    <input type="text" class="form-control" id="pray_user" name="pray_user" placeholder="Motivo de Oración del Creyente">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Nombre <span class="star">*</span></label>
                    <input type="text" class="form-control" id="name_guest_user" name="name_guest_user" placeholder="Persona que lo invitó">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Teléfono <span class="star">*</span></label>
                    <input type="text" class="form-control" id="phone_guest_user" name="phone_guest_user" placeholder="Teléfono de quien lo invitó">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" class="form-control" id="comment_guest_user" name="comment_guest_user" placeholder="Observaciones">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Sector <span class="star">*</span></label>
                    <select name="sector" class="form-control">
                      <option value="0">--</option>
                      <?php
                      for ($i = 0; $i < count($sector); $i++) {
                        echo '<option value=' . $sector[$i]['sector_number'] . '">' . 'Sector '.$sector[$i]['sector_number'] .' / '. $sector[$i]['sector_name'] .'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Supervisor <span class="star">*</span></label>
                    <select name="supervisor" class="form-control">
                      <option value="0">--</option>
                      <?php
                      for ($i = 0; $i < count($super); $i++) {
                        echo '<option value=' . $super[$i]['id_user'] . '">' . $super[$i]['user_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Lideres <span class="star">*</span></label>
                    <select name="lideres" class="form-control">
                      <option value="0">--</option>
                      <?php
                      for ($i = 0; $i < count($lider); $i++) {
                        echo '<option value=' . $lider[$i]['id_user'] . '">' . $lider[$i]['user_name'] . '</option>';
                      }
                      ?>
                    </select>
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
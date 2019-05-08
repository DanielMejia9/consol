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
  $reg->registerTip($_POST["name_tip"],$_POST["comment_tip"]);
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

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
          <h1 class="h3 mb-4 text-gray-800">Tipos de Usuarios</h1>
          <form action="tipo.php" method="post">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Tipo</label>
                    <input type="text" class="form-control" id="name_tip" name="name_tip" placeholder="Nombre del tipo de usuario">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" id="comment_tip" name="comment_tip" placeholder="Comentarios del tipo de usuario">
                  </div>
                </div>
              </div>
              <hr>
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
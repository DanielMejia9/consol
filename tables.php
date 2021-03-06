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
        $lis = $reg->listarPersonal();

        ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-2 text-gray-800">Reporte Personal</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-primary" href="register_user_personal.php" >Agregar Personal</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fecha </th>
                      <th>Nombre </th>
                      <th>Teléfono</th>
                      <th>Dirección</th>
                      <th>Edad</th>
                      <th>Estado Civil</th>
                      <th>Oracion</th>
                      <th>Invitador por</th>
                      <th>Teléfono</th>
                      <th>Comentario</th>
                      <th>Sector</th>
                      <th>Supervidor</th>
                      <th>Lider</th>
                      <th>Registrado por</th>
                      <th>VER</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Fecha </th>
                      <th>Nombre </th>
                      <th>Teléfono</th>
                      <th>Dirección</th>
                      <th>Edad</th>
                      <th>Estado Civil</th>
                      <th>Oracion</th>
                      <th>Invitador por</th>
                      <th>Teléfono</th>
                      <th>Comentario</th>
                      <th>Sector</th>
                      <th>Supervidor</th>
                      <th>Lider</th>
                      <th>Registrado por</th>
                      <th>VER</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    for ($i = 0; $i < count($lis); $i++) {
                      echo

                        '<tr>' .
                          '<td>'.
                           $lis[$i]['id_userp'] .
                          '</td>' .
                          '<td>'.
                           $lis[$i]['fecha'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_name_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_phone_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_address_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_age_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_statuscivil_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_pray_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_guests_by_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_phone_by_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_comment_by_p'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_sector'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_supervisor'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['user_lider'] .
                          '</td>' .
                          '<td>'
                          . $lis[$i]['id_user'] .
                          '</td>' .
                          '<td>'.'<a class="btn btn-secondary btn-sm" href="register_user_personal.php?id='.$lis[$i]['id_userp'].'">'.'VER'.'</a>'.'</td>'.
                          '</tr>'
                          ;
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

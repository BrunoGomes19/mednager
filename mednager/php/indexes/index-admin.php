<?php
include('../topos /topo_admin.php');


$sql = "SELECT * from comprador where emailComprador like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $LEIComprador = $row['LEIComprador'];

  $codPermissao = $row["codPermissao"];

  }
}

$sql1 = "SELECT count(*) as quantidade from comprador where codPermissao=2 and LEIComprador = $LEIComprador and associacao = 2";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


    $medicosRegistados = $row['quantidade'];


  }
}

$sql2 = "SELECT count(*) as quantidade from utente,associados,comprador where utente.ccUtente = associados.utente_ccUtente and associados.comprador_codComprador = comprador.codComprador and LEiComprador = $LEIComprador and associados.confirmacao = 1 and comprador.codPermissao = 2;";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


    $utentesRegistados = $row['quantidade'];


  }
}

//SELECT count(*) from servico, comprador where servico.codComprador = comprador.codComprador and LEIComprador=1;

$sql3 = "SELECT count(*) as quantidade from servico, comprador where servico.codComprador = comprador.codComprador and LEIComprador='$LEIComprador' and servico.start between now() and concat(curdate(),' 23:59:59');";
$result = $conn->query($sql3);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $intervencoesHojeTodos = $row['quantidade'];

  }
}

$sql3 = "SELECT count(*) as quantidade from servico, comprador where servico.codComprador = comprador.codComprador and LEIComprador='$LEIComprador' and servico.start between now() and concat((curdate() + INTERVAL 6 - weekday(curdate()) DAY),' 23:59:59');";
$result = $conn->query($sql3);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $intervencoesSemanaTodos = $row['quantidade'];

  }
}





?>

<meta charset="UTF-8">

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">



                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="title-1" style="text-align: left"><br><big>Olá, Administrador! </big><br><br><br></h1>
                                
                            </div>
                        </div>


                        <?php

                        @session_start();

                        if (isset($_SESSION['msgUtenteAdd'])) {
                            echo $_SESSION['msgUtenteAdd'];
                            unset($_SESSION['msgUtenteAdd']);
                        }
                        ?>

                        <?php

                        @session_start();

                        if (isset($_SESSION['msgMedicoAdd'])) {
                            echo $_SESSION['msgMedicoAdd'];
                            unset($_SESSION['msgMedicoAdd']);
                        }
                        ?>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4" style="height:83%;text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-user-md"></i>
                                                <div class="text">
                                                    <h2>&nbsp;<?php  echo $medicosRegistados;  ?></h2>
                                            </div>
                                            </div>
                                            <div class="text">
                                                <span>médicos associados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c3" style="height:83%;text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                                <div class="text">
                                                <h2>&nbsp;<?php echo $utentesRegistados; ?></h2>
                                            </div>
                                            </div>
                                            <div class="text">
                                                <span><div>utentes associados</div></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c1" style="height:83%;text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                                <div class="text">
                                                <h2>&nbsp;<?php   echo $intervencoesHojeTodos;   ?></h2>
                                            </div>
                                            </div>
                                            <div class="text">
                                                <span>
                                                    <div>intervenções hoje</div>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c2" style="height:83%;width: 108%; text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                                <div class="text">
                                                <h2>&nbsp;<?php   echo $intervencoesSemanaTodos;   ?></h2>
                                            </div>
                                            </div>
                                            <div class="text">
                                                <span>intervenções semanais</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 mednager. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../../Interior/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../Interior/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../Interior/vendor/slick/slick.min.js">
    </script>
    <script src="../../Interior/vendor/wow/wow.min.js"></script>
    <script src="../../Interior/vendor/animsition/animsition.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../Interior/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../Interior/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../Interior/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../Interior/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Interior/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../Interior/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../Interior/js/main.js"></script>

    <script>

    window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove();
     });
    }, 9000);

    </script>

</body>

</html>
<!-- end document-->
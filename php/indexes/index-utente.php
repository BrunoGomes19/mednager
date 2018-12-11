<?php
include('../topos/topo_utente.php');

$sql = "SELECT * from utente where emailUtente like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $ccUtente = $row["ccUtente"];

  }
}

$sql1 = "SELECT distinct count(*) as quantidade from associados where associados.utente_ccUtente=$ccUtente and associados.confirmacao=1;";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $medicosAssociados = $row['quantidade'];

  }
}

$sql2 = "SELECT count(*) as quantidade from servico where servico.ccUtente=$ccUtente and servico.start between now() and concat(curdate(),' 23:59:59');";
$result = $conn->query($sql2);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $intervencoesHoje = $row['quantidade'];

  }
}

$sql3 = "SELECT count(*) as quantidade from servico where servico.ccUtente=$ccUtente and servico.start > now();";
$result = $conn->query($sql3);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $intervencoesFuturas = $row['quantidade'];

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
                                <div class="overview-wrap">
                                    <h2 class="title-1">Olá, <?php

									if($sexo=="Masculino"){

										echo "Sr. ";

									}else{
                    if($sexo=="Feminino"){
										echo "Sra. ";
                  }else{

                    echo "Sr(a). ";

                  }
									}

									?><?php $login_session=$_SESSION['login_user']; echo $nome;?>! <br><br><br></h2>

                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1" style="height:83%;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-user-md"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $medicosAssociados;    ?> </h2>
                                                <span>médicos associados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3" style="height:83%;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php  echo $intervencoesHoje;   ?></h2>
                                                <span>intervenções hoje</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c4" style="height:83%;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $intervencoesFuturas;    ?></h2>
                                                <span>intervenções futuras</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <br><br><br><br><br><br>


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

</body>

</html>
<!-- end document-->

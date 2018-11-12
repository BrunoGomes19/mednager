<?php
include('../topos /topo_admin.php');


$sql = "SELECT * from comprador where emailComprador like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $LEIComprador = $row['LEIComprador'];

  }
}


$sql1 = "SELECT count(*) as quantidade from comprador where codPermissao=2";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


    $medicosRegistados = $row['quantidade'];


  }
}

$sql2 = "SELECT count(*) as quantidade from utente where codPermissao=3";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


    $utentesRegistados = $row['quantidade'];


  }
}

//SELECT count(*) from servico, comprador where servico.codComprador = comprador.codComprador and LEIComprador=1;

$sql3 = "SELECT count(*) as quantidade from servico, comprador where servico.codComprador = comprador.codComprador and LEIComprador='$LEIComprador' and servico.dataHoraServico between now() and concat(curdate(),' 23:59:59');";
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

$sql3 = "SELECT count(*) as quantidade from servico, comprador where servico.codComprador = comprador.codComprador and LEIComprador='$LEIComprador' and servico.dataHoraServico between now() and concat((curdate() + INTERVAL 6 - weekday(curdate()) DAY),' 23:59:59');";
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
                                <div class="overview-wrap">
                                    <h2 class="title-1">Olá, Administrador! <br><br><br></h2>

                                </div>
                            </div>
                        </div>

                        <?php

            					$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            					if(strpos($fullUrl, "utente=add") == true){

                        echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
        							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							   <span style="color:white;">Obrigado por realizar o registo do utente ';echo $_GET['nome'];echo '!<br>Ser-lhe-á enviado um e-mail com as credenciais.</span>
        								</div>';



            					}else{

                        if(strpos($fullUrl, "medico=add") == true){

                          echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
          							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          							   <span style="color:white;">Obrigado por realizar o registo do médico ';echo $_GET['nome'];echo '!<br>Ser-lhe-á enviado um e-mail com as credenciais.</span>
          								</div>';



              					}

                      }

                      ?>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-user-md"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php  echo $medicosRegistados;  ?></h2>
                                                <span>médicos registados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $utentesRegistados; ?></h2>
                                                <span>
                                                    <div>utentes</div>
                                                    <div>registados</div>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $intervencoesHojeTodos;   ?></h2>
                                                <span>
                                                    <div>intervenções</div>
                                                    <div>hoje</div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $intervencoesSemanaTodos;   ?></h2>
                                                <span>intervenções esta semana</span>
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

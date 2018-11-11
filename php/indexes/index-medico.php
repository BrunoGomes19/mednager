<?php
include('../topos/topo_medico.php');

$codPermissao = $_SESSION['permissao'];

$sql = "SELECT * from comprador where emailComprador like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $codComprador = $row["codComprador"];

  }
}






$sql2 = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao='$codPermissao' and servico.codComprador='$codComprador' and servico.dataHoraServico between now() and concat(curdate(),' 23:59:59');";
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





$sql3 = "SELECT distinct count(*) as quantidade from associados where associados.comprador_codComprador=$codComprador;";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $utentesAssociados = $row['quantidade'];

  }
}

$sql4 = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao='$codPermissao' and servico.codComprador='$codComprador' and servico.dataHoraServico between now() and concat((curdate() + INTERVAL 6 - weekday(curdate()) DAY),' 23:59:59');";
$result = $conn->query($sql4);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $intervencoesSemana = $row['quantidade'];

  }
}

//

$sql5 = "select count(quantidade) as quantidadetotal from (select count(DISTINCT codLocal) as quantidade FROM servico where codComprador=$codComprador and servico.dataHoraServico between now() and concat(curdate(),' 23:59:59') group by codLocal) as a;";
$result = $conn->query($sql5);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $locaisdiferentes = $row['quantidadetotal'];

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

										echo "Dr. ";

									}else{
                    if($sexo=="Feminino"){
										echo "Dra. ";
                    }else{

                        echo "Dr(a). ";
                    }
									}

									?> <?php echo $nome;?>! <br><br><br></h2>

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



                        }

                        ?>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $utentesAssociados;   ?></h2>
                                                <span>utentes associados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $locaisdiferentes;    ?></h2>
                                                <span>locais diferentes de intervenções hoje</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php   echo $intervencoesHoje;   ?></h2>
                                                <span>intervenções hoje</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php  echo $intervencoesSemana;  ?></h2>
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

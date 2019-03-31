<?php
include('../topos/topo_medico.php');

$codPermissao = $_SESSION['permissao'];

$sql = "SELECT * from comprador where emailComprador like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $codComprador = $row["codComprador"];

  $codPermissao = $row["codPermissao"];

  }
}

$sql2 = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao='$codPermissao' and servico.codComprador='$codComprador' and servico.start between now() and concat(curdate(),' 23:59:59');";
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





$sql3 = "SELECT distinct count(*) as quantidade from associados where associados.comprador_codComprador=$codComprador and confirmacao=1;";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $utentesAssociados = $row['quantidade'];

  }
}

$sql4 = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao='$codPermissao' and servico.codComprador='$codComprador' and servico.start between DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) and concat((curdate() + INTERVAL 6 - weekday(curdate()) DAY),' 23:59:59');";
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

$sql5 = "select count(quantidade) as quantidadetotal from (select count(DISTINCT codLocal) as quantidade FROM servico where codComprador=$codComprador and servico.start between now() and concat(curdate(),' 23:59:59') group by codLocal) as a;";
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
                                    <h1 class="title-1"><br><big>Olá, <?php



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

                        @session_start();

                        if (isset($_SESSION['msgUtenteAdd'])) {
                            echo $_SESSION['msgUtenteAdd'];
                            unset($_SESSION['msgUtenteAdd']);
                        }
                        ?> </big></h1>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4" style="height:20%; width: 108%; text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                                <div class="text">
                                                    <h2>&nbsp;<?php echo $utentesAssociados; ?></h2>
                                                </div>
                                            </div>
                                            <div class="text">                                               
                                                <span>utentes associados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c3" style="height:20%; width: 108%; text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                                <div class="text">
                                                    <h2>&nbsp;<?php echo $locaisdiferentes; ?></h2>
                                                 </div>
                                            </div>
                                            <div class="text">                                              
                                                <span>locais de hoje</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-lg-2">
                                <div class="overview-item overview-item--c1" style="height:20%; width: 108%; text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                                <div class="text">
                                                    <h2>&nbsp;<?php echo $intervencoesHoje; ?></h2>
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
                                <div class="overview-item overview-item--c2" style="height:20%; width: 108%; text-align: center">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                                <div class="text">
                                                    <h2>&nbsp;<?php echo $intervencoesSemana; ?></h2>
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

                        
                        <!--<script>
                            window.onload = function () {

                            var dps = []; // dataPoints
                            var chart = new CanvasJS.Chart("chartContainer", {
                                axisY: {
                                    includeZero: false
                                },      
                                data: [{
                                    type: "line",
                                    dataPoints: dps
                                }]
                            });

                            var xVal = 0;
                            var yVal = 100; 
                            var updateInterval = 1000;
                            var dataLength = 20; // number of dataPoints visible at any point

                            var updateChart = function (count) {

                                count = count || 1;

                                for (var j = 0; j < count; j++) {
                                    yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
                                    dps.push({
                                        x: xVal,
                                        y: yVal
                                    });
                                    xVal++;
                                }

                                if (dps.length > dataLength) {
                                    dps.shift();
                                }

                                chart.render();
                            };

                            updateChart(dataLength);
                            setInterval(function(){updateChart()}, updateInterval);

                            }
                        </script>
                        <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h5 class="title-3">Intervenções : mês</h5>
                                        <div id="chartContainer" style="height: 370px; width:100%;"></div>
                                        </div>
                                    </div>
                                </div>
                        <div>
                            
                        </div>-->

                        <div class="row" style="margin-top:auto;">
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

    <!--Do Gráfico-->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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

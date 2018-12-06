<!DOCTYPE html>
<html>
<head>
  <?php
  include('../topos/topo_admin.php');
  ?>

</head>
<body>
  <?php

  $emailComprador=$_SESSION['email'];

  $sqlLEI = "select LEIComprador from comprador where emailComprador like '$emailComprador'";


  $result = $conn->query($sqlLEI);

  if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
      $LEIComprador = $row["LEIComprador"];

    }

  } else {
    echo "Error1";
  }

  $sqtotalMed = "select emailComprador, count(*) as nrMed from comprador where codPermissao=2";


  $result = $conn->query($sqtotalMed);

  if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
      $nrMed = $row["nrMed"];

    }

  } else {
    echo "Error2";
  }


  $sql = "select sexoComprador as descricao, count(*) as c from comprador where LEIComprador='$LEIComprador' and codPermissao=2 group by sexoComprador";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $contagem_masculino=0;
    $contagem_feminino=0;
    $contagem_outro=0;
    $contagem_nd=0;
    while($row = $result->fetch_assoc()) {

      $sexoComprador = $row["descricao"];
      if(strcmp($sexoComprador, "Feminino") == 0){
        $contagem_feminino = $row["c"];
      }
      else if (strcmp($sexoComprador, "Outro") == 0){
        $contagem_outro = $row["c"];
      } else if (strcmp($sexoComprador, "Masculino") == 0){
        $contagem_masculino = $row["c"];
      }
      else{
        $contagem_nd = $row["c"];
      }
    }


  } else {
    echo "Error";
  }



  $sql2 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0) {
    $arrayEsp = array();
  while($row = $result->fetch_assoc()) {

    array_push($arrayEsp, $row["descriEspecialidade"], parseInt($row["nrMedicos"]));

  }

  } else {
  echo "Error";
  }



  $sql3 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result3 = $conn->query($sql3);

  if ($result3->num_rows > 0) {
    $arrayLoc = array();
  while($row = $result->fetch_assoc()) {

    array_push($arrayLoc, $row["local.descriLocal"], parseInt($row["nrEsp"]));

  }

  } else {
  echo "Error";
  }



  $conn->close();


  ?>



  <!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">


    <div class="row" >
      <div class="col-md-12" >
        <!-- SEXO DOS UTENTES-->
        <div id="piechart" style="width: 970px; height: 500px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Sexo', 'Quantidade'],
        ['Masculino',     <?php echo $contagem_masculino; ?>],
        ['Feminino',      <?php echo $contagem_feminino; ?>],
        ['Outro',    <?php echo $contagem_outro; ?>],
        ['Sem nenhuma informação',    <?php echo $contagem_nd; ?>]
        ]);

        var options = {
        title: '% Sexo dos Médicos associados',
        colors: ['#5fbace', '#4c94a4', '#4c94a4', '#264a52', '#264a52']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
        </script>



        <!-- MEDICOS POR ESP-->
        <div id="chart_div" style="width: 970px; height: 150px;"></div>

        <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

          var data = google.visualization.arrayToDataTable([

            ['Especialidade', 'Número de médicos',],
            <?php
            if($result2->num_rows > 0){
              while($row = $result2->fetch_assoc()){
                echo "['".$row['descriEspecialidade']."', ".$row['nrMedicos']."],";
              }
            }
            ?>
            ['TOTAL', <?php echo $nrMed; ?>]
          ]);

          var options = {
            title: 'Número de Médicos por Especialidade',
            colors: ['#5fbace'],
            vAxis: {
              textStyle : {
                fontSize: 13 // or the number you want

              }
            },

            hHaxis: {
              chxs: '0N*f0',
            },

            chartArea:{left:190,top:40,bottom: 40,width:"30%",height:"100%"},

          };

          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

          chart.draw(data, options);
        }
        </script>



        <!-- NR de CONSULTAS-->
        <div id="donutchart" style="width: 970px; height: 450px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php
            if($result3->num_rows > 0){
              while($row = $result3->fetch_assoc()){
                echo "['".$row['descriLocal']."', ".$row['nrEsp']."],";
              }
            }
            ?>
            ]);

            var options = {
              title: '% Consultas por Local',
              pieHole: 0.4,
              colors: ['#5fbace', '#4c94a4', '#4c94a4', '#264a52', '#264a52']

            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
          }
        </script>











      </div>
    </div>





  </div>
</div>


<!-- Jquery JS-->
<script src="../../Interior/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="../../Interior/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="../../Interior/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS -->
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

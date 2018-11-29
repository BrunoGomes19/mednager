<!DOCTYPE html>
<html>
<head>
  <?php
  include('../topos/topo_medico.php');
  ?>

</head>
<body>
  <?php

  $emailComprador=$_SESSION['email'];

  $sql = "select sexoUtente as descricao, count(*) as c from comprador, utente, associados where associados.comprador_codComprador=comprador.codComprador and associados.utente_ccUtente=utente.ccUtente and  emailComprador like '$emailComprador' group by sexoUtente";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $contagem_masculino=0;
    $contagem_feminino=0;
    $contagem_outro=0;
    $contagem_nd=0;
    while($row = $result->fetch_assoc()) {

      $sexoUtente = $row["descricao"];
      if(strcmp($sexoUtente, "Feminino") == 0){
        $contagem_feminino = $row["c"];
      }
      else if (strcmp($sexoUtente, "Outro") == 0){
        $contagem_outro = $row["c"];
      } else if (strcmp($sexoUtente, "Masculino") == 0){
        $contagem_masculino = $row["c"];
      }
      else{
        $contagem_nd = $row["c"];
      }

    }


  } else {
    echo "Error";
  }




  $sql2 = "select distinct titularAIM, count(*) as nrtits from medicamento group by titularAIM";
  $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0) {
    $arrayTits = array();
  while($row = $result->fetch_assoc()) {

    array_push($arrayTits, $row["titularAIM"], parseInt($row["nrtits"]));

  }

  } else {
  echo "Error";
  }


  $sqlcodCom = "select codComprador from comprador where emailComprador like '$emailComprador'";


  $result = $conn->query($sqlcodCom);

  if ($result->num_rows > 0) {
    // output data of each row  
    
    while($row = $result->fetch_assoc()) {
      $codComprador = $row["codComprador"];

    }

  } else {
    echo "Error1";
  }

  
  



  $sqlsegunda = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 0 - weekday(curdate()) DAY";

  $resultSegunda = $conn->query($sqlsegunda);

  if ($resultSegunda->num_rows > 0) {
   
  while($row = $resultSegunda->fetch_assoc()) {
      $qttsegunda = $row["quantidade"];

  }

  } else {
  echo "Error";
  }

  $sqldomingo = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL -1 - weekday(curdate()) DAY";
  $resultdomingo = $conn->query($sqldomingo);

  if ($resultdomingo->num_rows > 0) {
   
  while($row = $resultdomingo->fetch_assoc()) {
      $qtttdomingo = $row["quantidade"];

  }

  } else {
  echo "Error";
  }


  $sqlterca = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 1 - weekday(curdate()) DAY";
  $resultTerca = $conn->query($sqlterca);

  if ($resultTerca->num_rows > 0) {
   
  while($row = $resultTerca->fetch_assoc()) {
      $qtttTerca = $row["quantidade"];

  }

  } else {
  echo "Error";
  }


$sqlquarta = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 2 - weekday(curdate()) DAY";
  $resultQuarta = $conn->query($sqlquarta);

  if ($resultQuarta->num_rows > 0) {
   
  while($row = $resultQuarta->fetch_assoc()) {
      $qtttQuarta = $row["quantidade"];

  }

  } else {
  echo "Error";
  }

  $sqlquinta = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 2 - weekday(curdate()) DAY";
  $resultQuinta = $conn->query($sqlquinta);

  if ($resultQuinta->num_rows > 0) {
   
  while($row = $resultQuinta->fetch_assoc()) {
      $qtttQuinta = $row["quantidade"];

  }

  } else {
  echo "Error";
  }

  $sqlsexta = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 4 - weekday(curdate()) DAY";
  $resultSexta = $conn->query($sqlsexta);

  if ($resultSexta->num_rows > 0) {
   
  while($row = $resultSexta->fetch_assoc()) {
      $qtttSexta = $row["quantidade"];

  }

  } else {
  echo "Error";
  }


  $sqlsabado = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 5 - weekday(curdate()) DAY";
  $resultSabado = $conn->query($sqlsabado);

  if ($resultSabado->num_rows > 0) {
   
  while($row = $resultSabado->fetch_assoc()) {
      $qtttSabado = $row["quantidade"];

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
        <div id="piechart" style="width: 1170px; height: 500px;"></div>

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
        title: '% Sexo dos utentes associados',
        colors: ['#5fbace', '#4c94a4', '#4c94a4', '#264a52', '#264a52'],
        is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
        </script>





        <div id="chart_div" style="width: 1000px; height: 5900px;"></div>

        <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

          var data = google.visualization.arrayToDataTable([

            ['Titular AIM', 'Número de medicamentos',],
            <?php
            if($result2->num_rows > 0){
                while($row = $result2->fetch_assoc()){
                  echo "['".$row['titularAIM']."', ".$row['nrtits']."],";
                }
            }
            ?>
          ]);

          var options = {
            title: 'Número de medicamentos por Titular titularAIM',
            colors: ['#5fbace'],
            vAxis: {
              textStyle : {
                fontSize: 10 // or the number you want
              }
            },
            chartArea:{left:300,top:40,bottom: 30,width:"100%",height:"100%"}

          };

          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

          chart.draw(data, options);
        }
        </script>


        <div id="columnchart_values" style="width: 1170px; height: 600px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["dia", "número de consultas", { role: "style" } ],
              
              ["DOM", <?php echo $qtttdomingo; ?>, "#5fbace"],
              ["SEG", <?php echo $qttsegunda; ?>, "#4c94a4"],
              ["TER", <?php echo $qtttTerca; ?>, "#264a52"],
              ["QUA", <?php echo $qtttQuarta; ?>, "#264a52"],
              ["QUI", <?php echo $qtttQuinta; ?>, "gold"],
              ["SEX", <?php echo $qtttSexta; ?>, "#b87333"],
              ["SAB", <?php echo $qtttSabado; ?>, "color: #e5e4e2"]
            ]);

            

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                             { calc: "stringify",
                               sourceColumn: 1,
                               type: "string",
                               role: "annotation" },
                             2]);

            var options = {
              title: "Número de consultas por semana",
              width: 1000,
              height: 600,
              bar: {groupWidth: "95%"},
              legend: { position: "none" },
              hAxis: {format: 'decimal'},
              vAxis: {format: 'decimal'}
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
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

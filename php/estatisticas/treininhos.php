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
        
        <div id="columnchart_values" style="width: 1170px; height: 500px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["dia", "número de consultas", { role: "style" } ],
              
              ["DOM", <?php echo $qtttdomingo; ?>, "silver"],
              ["SEG", <?php echo $qttsegunda; ?>, "gold"],
              ["TER", <?php echo $qtttTerca; ?>, "gold"],
              ["QUA", <?php echo $qtttQuarta; ?>, "gold"],
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

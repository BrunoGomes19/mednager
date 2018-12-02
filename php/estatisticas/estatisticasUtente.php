<!DOCTYPE html>
<html>
<head>
  <?php
  include('../topos/topo_utente.php');
  ?>

</head>
<body>
  <?php


  $emailUtente=$_SESSION['email'];
  

  $sqlJAN = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 01";
  $resultJAN = $conn->query($sqlJAN);

  if ($resultJAN->num_rows > 0) {
   
  while($row = $resultJAN->fetch_assoc()) {
      $qttJAN = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlFEV = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 02";
  $resultFEV = $conn->query($sqlFEV);

  if ($resultFEV->num_rows > 0) {
   
  while($row = $resultFEV->fetch_assoc()) {
      $qttFEV = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlMAR = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 03";
  $resultMAR = $conn->query($sqlMAR);

  if ($resultMAR->num_rows > 0) {
   
  while($row = $resultMAR->fetch_assoc()) {
      $qttMAR = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlABR = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 04";
  $resultABR = $conn->query($sqlABR);

  if ($resultABR->num_rows > 0) {
   
  while($row = $resultABR->fetch_assoc()) {
      $qttABR = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }


  $sqlMAI = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 05";
  $resultMAI = $conn->query($sqlMAI);

  if ($resultMAI->num_rows > 0) {
   
  while($row = $resultMAI->fetch_assoc()) {
      $qttMAI = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }


  $sqlJUN = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 06";
  $resultJUN = $conn->query($sqlJUN);

  if ($resultJUN->num_rows > 0) {
   
  while($row = $resultJUN->fetch_assoc()) {
      $qttJUN = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlJUL = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 07";
  $resultJUL = $conn->query($sqlJUL);

  if ($resultJUL->num_rows > 0) {
   
  while($row = $resultJUL->fetch_assoc()) {
      $qttJUL = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlAGO = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 08";
  $resultAGO = $conn->query($sqlAGO);

  if ($resultAGO->num_rows > 0) {
   
  while($row = $resultAGO->fetch_assoc()) {
      $qttAGO = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlSET = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 09";
  $resultSET = $conn->query($sqlSET);

  if ($resultSET->num_rows > 0) {
   
  while($row = $resultSET->fetch_assoc()) {
      $qttSET = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlOUT = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 10";
  $resultOUT = $conn->query($sqlOUT);

  if ($resultOUT->num_rows > 0) {
   
  while($row = $resultOUT->fetch_assoc()) {
      $qttOUT = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlNOV = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 09";
  $resultNOV = $conn->query($sqlNOV);

  if ($resultOUT->num_rows > 0) {
   
  while($row = $resultOUT->fetch_assoc()) {
      $qttNOV = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlDEZ = "SELECT count(*) as nrConsultas FROM servico WHERE MONTH(servico.start) = 09";
  $resultDEZ = $conn->query($sqlDEZ);

  if ($resultDEZ->num_rows > 0) {
   
  while($row = $resultDEZ->fetch_assoc()) {
      $qttDEZ = $row["nrConsultas"];

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
        

<!--grafico nr consultas -->
        <div id="columnchart_values" style="width: 1170px; height: 600px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["mês", "número de consultas", { role: "style" } ],
              
              ["JAN", <?php echo $qttJAN; ?>, "#5fbace"],
              ["FEV", <?php echo $qttFEV; ?>, "#4c94a4"],
              ["MAR", <?php echo $qttMAR; ?>, "#264a52"],
              ["ABR", <?php echo $qttABR; ?>, "#264a52"],
              ["MAI", <?php echo $qttMAI; ?>, "gold"],
              ["JUN", <?php echo $qttJUN; ?>, "#b87333"],
              ["JUL", <?php echo $qttJUL; ?>, "#b87333"],
              ["AGO", <?php echo $qttAGO; ?>, "#b87333"],
              ["SET", <?php echo $qttSET; ?>, "#b87333"],
              ["OUT", <?php echo $qttOUT; ?>, "#b87333"],
              ["NOV", <?php echo $qttNOV; ?>, "#b87333"],
              ["DEZ", <?php echo $qttDEZ; ?>, "#e5e4e2"]
            ]);

            

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                             { calc: "stringify",
                               sourceColumn: 1,
                               type: "string",
                               role: "annotation" },
                             2]);

            var options = {
              title: "Número de consultas por mês",
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

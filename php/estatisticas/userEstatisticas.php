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



  $sqlJAN = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 01 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultJAN = $conn->query($sqlJAN);

  if ($resultJAN->num_rows > 0) {

  while($row = $resultJAN->fetch_assoc()) {
      $qttJAN = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }


  $sqlFEV = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 02 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultFEV = $conn->query($sqlFEV);

  if ($resultFEV->num_rows > 0) {

  while($row = $resultFEV->fetch_assoc()) {
      $qttFEV = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }


  $sqlMAR = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 03 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultMAR = $conn->query($sqlMAR);

  if ($resultMAR->num_rows > 0) {

  while($row = $resultMAR->fetch_assoc()) {
      $qttMAR = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }


  $sqlABR = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 04 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultABR = $conn->query($sqlABR);

  if ($resultABR->num_rows > 0) {

  while($row = $resultABR->fetch_assoc()) {
      $qttABR = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }



  $sqlMAI = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 05 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultMAI = $conn->query($sqlMAI);

  if ($resultMAI->num_rows > 0) {

  while($row = $resultMAI->fetch_assoc()) {
      $qttMAI = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }



  $sqlJUN = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 06 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultJUN = $conn->query($sqlJUN);

  if ($resultJUN->num_rows > 0) {

  while($row = $resultJUN->fetch_assoc()) {
      $qttJUN = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlJUL = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 07 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultJUL = $conn->query($sqlJUL);

  if ($resultJUL->num_rows > 0) {

  while($row = $resultJUL->fetch_assoc()) {
      $qttJUL = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlAGO = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 08 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultAGO = $conn->query($sqlAGO);

  if ($resultAGO->num_rows > 0) {

  while($row = $resultAGO->fetch_assoc()) {
      $qttAGO = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlSET = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 09 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultSET = $conn->query($sqlSET);

  if ($resultSET->num_rows > 0) {

  while($row = $resultSET->fetch_assoc()) {
      $qttSET = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlOUT = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 10 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultOUT = $conn->query($sqlOUT);

  if ($resultOUT->num_rows > 0) {

  while($row = $resultOUT->fetch_assoc()) {
      $qttOUT = $row["nrConsultas"];

  }

  } else {
  echo "Error";
  }

  $sqlNOV = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 11 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
  $resultNOV = $conn->query($sqlNOV);

  if ($resultNOV->num_rows > 0) {

  while($row = $resultNOV->fetch_assoc()) {
      $qttNOV = $row["nrConsultas"];

  }



  } else {
  echo "Error";
  }

  $sqlDEZ = "SELECT count(*) as nrConsultas FROM servico, utente WHERE MONTH(servico.start) = 12 and servico.ccUtente=utente.ccUtente and emailUtente='$emailUtente'";
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<!--grafico nr consultas -->
        <canvas id="bar-chart" width="1700" height="500"></canvas>
        <script>
          new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET", "OUT", "NOV", "DEZ"],
      datasets: [
        {
          label: "Consultas",
          backgroundColor: ["#5fbace", "#FF4848","#CDD11B","#23819C","#5fbace", "#FF4848", "#CDD11B", "#23819C", "#5fbace", "#FF4848", "#CDD11B", "#23819C"],
          data: [<?php echo $qttJAN; ?>,
                <?php echo $qttFEV; ?>,
                <?php echo $qttMAR; ?>,
                <?php echo $qttABR; ?>,
                <?php echo $qttMAI; ?>,
                <?php echo $qttJUN; ?>,
                <?php echo $qttJUL; ?>,
                <?php echo $qttAGO; ?>,
                <?php echo $qttSET; ?>,
                <?php echo $qttOUT; ?>,
                <?php echo $qttNOV; ?>,
                <?php echo $qttDEZ; ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Número de intervenções este mês'
      },
      scales: {
        yAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                // OR //
                beginAtZero: true, // minimum value will be 0.
                stepSize: 1
            }
        }]
      }
    }
});
        </script>

        <br>
        <br>






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

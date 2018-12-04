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

  $sql22 = "select distinct titularAIM, count(*) as nrtits from medicamento group by titularAIM";
  $result22 = $conn->query($sql22);

  $sql222 = "select distinct titularAIM, count(*) as nrtits from medicamento group by titularAIM";
  $result222 = $conn->query($sql22);


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

  $sqlquinta = "SELECT count(*) as quantidade from servico,comprador where comprador.codComprador = servico.codComprador and comprador.codPermissao=2 and servico.codComprador='$codComprador' and servico.start=curdate() + INTERVAL 3 - weekday(curdate()) DAY";
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
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <!--grafico sexos -->
        <canvas id="pie-chart" width="1000" height="300"></canvas>

        <script>
          new Chart(document.getElementById("pie-chart"), {
              type: 'pie',
              data: {
                labels: ["Masculino", "Feminino", "Outro", "Sem nenhuma informação"],
                datasets: [{
                  label: "Utente por sexo (quantidade)",
                  backgroundColor: ["#5fbace", "#FF4848","#CDD11B","#23819C"],
                  data: [<?php echo $contagem_masculino; ?>,<?php echo $contagem_feminino; ?>,<?php echo $contagem_outro; ?>,<?php echo $contagem_nd; ?>]
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Número de untentes por sexo (quantidade)'
                }
              }
          });
        </script>

        <br>
        <br>
        <!--grafico nr consultas -->
        <canvas id="bar-chart" width="1700" height="500"></canvas>
        <script>
          new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
      datasets: [
        {
          label: "Consultas",
          backgroundColor: ["#5fbace", "#FF4848","#CDD11B","#23819C","#5fbace", "#FF4848", "#CDD11B"],
          data: [<?php echo $qtttdomingo; ?>,<?php echo $qttsegunda; ?>,<?php echo $qtttTerca; ?>,<?php echo $qtttQuarta; ?>,<?php echo $qtttQuinta; ?>,<?php echo $qtttSexta; ?>,<?php echo $qtttSabado; ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Número de consultas esta semana'
      }
    }
});
        </script>

        <br>
        <br>
<!--grafico titulares -->
        <canvas id="bar-chart-horizontal" width="1000" height="2090"></canvas>

        <script>
          new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: [<?php
      if($result2->num_rows > 0){
          while($row = $result2->fetch_assoc()){
            echo "'".$row['titularAIM']."',";
          }
      }
    ?>], 
      datasets: [
        {
          label: "Número de medicamentos",
          backgroundColor: [<?php
      if($result222->num_rows > 0){
          while($row = $result222->fetch_assoc()){
            echo "'#5fbace',";
          }
      }
    ?>],
          data: [<?php
      if($result22->num_rows > 0){
          while($row = $result22->fetch_assoc()){
            echo "'".$row['nrtits']."',";
          }
      }
    ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Número de medicamentos por titular AIM'
      }
    }
});
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
<!--
<script src="../../Interior/vendor/chartjs/Chart.bundle.min.js"></script> -->
<script src="../../Interior/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="../../Interior/js/main.js"></script>




</body>
</html>

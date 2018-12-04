<!DOCTYPE html>
<html>
<head>
  <?php
  include('../topos/topo_Admin.php');
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


  $resultmeds = $conn->query($sqtotalMed);

  if ($resultmeds->num_rows > 0) {
    // output data of each row  
    
    while($row = $resultmeds->fetch_assoc()) {
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
    echo "Error3";
  }



  $sql2 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result2 = $conn->query($sql2);

  $sql22 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result22 = $conn->query($sql22);

  $sql222 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result222 = $conn->query($sql222);

  




  $sql3 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result3 = $conn->query($sql3);

  $sql33 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result33 = $conn->query($sql33);

  $sql333 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result333 = $conn->query($sql333);

  



  $conn->close();


  ?>



  <!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <div class="row" >
      <div class="col-md-12" >

        <!--grafico sexos -->
        <canvas id="pie-chart" width="1000" height="300"></canvas>

        <script>
          new Chart(document.getElementById("pie-chart"), {
              type: 'pie',
              data: {
                labels: ["Masculino", "Feminino", "Outro", "Sem nenhuma informação"],
                datasets: [{
                  label: "Médico por sexo por sexo (quantidade)",
                  backgroundColor: ["#5fbace", "#FF4848","#CDD11B","#23819C"],
                  data: [<?php echo $contagem_masculino; ?>,<?php echo $contagem_feminino; ?>,<?php echo $contagem_outro; ?>,<?php echo $contagem_nd; ?>]
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Número de médicos por sexo (quantidade)'
                }
              }
          });
        </script>

        <br>
        <br>        


        <!--grafico numero de medicos por especialidade -->
        <canvas id="bar-chart-horizontal" width="1000%" height="200%"></canvas>

        <script>
          new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    axisX: {    
      scaleBreaks: {
        customBreaks: [{
          startValue: 10000,
          endValue: 35000
        }]
      }
    },
    data: {
      labels: [<?php
      if($result2->num_rows > 0){
          while($row = $result2->fetch_assoc()){
            echo "'".$row['descriEspecialidade']."',";
          }
      }
    ?>, 'Total'], 
      datasets: [
        {
          label: "Número de médicos",
          backgroundColor: [<?php
      if($result222->num_rows > 0){
          while($row = $result222->fetch_assoc()){
            echo "'#5fbace',";
          }
      }
    ?>, '#5fbace'],
          data: [<?php
      if($result22->num_rows > 0){
          while($row = $result22->fetch_assoc()){
            echo "'".$row['nrMedicos']."',";
          }
      }
    ?>, <?php echo $nrMed; ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Número de médicos por especialidade'
      }
    }
});
        </script>
        <br>
        <br>

        <!--grafico de locais-->

        <canvas id="bar-chart-horizontal2" width="1000%" height="100%"></canvas>

        <script>
          new Chart(document.getElementById("bar-chart-horizontal2"), {
    type: 'horizontalBar',

    data: {
      labels: [<?php
      if($result3->num_rows > 0){
          while($row = $result3->fetch_assoc()){
            echo "'".$row['descriLocal']."',";
          }
      }
    ?>], 
      datasets: [
        {
          label: "Número de consultas",
          backgroundColor: [<?php
      if($result333->num_rows > 0){
          while($row = $result333->fetch_assoc()){
            echo "'#5fbace',";
          }
      }
    ?>],
          data: [<?php
      if($result33->num_rows > 0){
          while($row = $result33->fetch_assoc()){
            echo "'".$row['nrEsp']."',";
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
        text: 'Número de consultas por local'
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
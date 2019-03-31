<!DOCTYPE html>
<html>
<head>
  <?php
  include('../topos/topo_admin.php');
  ?>

</head>
<body>
   <!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <div class="row" >
      <div class="col-md-12" >
        <h3 class="title-5 m-b-35" style="text-align: center">Estatísticas</h3>
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

 


  $sql = "select sexoComprador as descricao, count(*) as c from comprador where LEIComprador='$LEIComprador' and codPermissao=2 and associacao=2 group by sexoComprador";

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
    echo '<canvas id="pie-chart" width="3000" height="1000"></canvas>';


  } else {
    echo "<br><br> Não há utentes médicos associados";
    $semAssociacoes=100;
  }


   $sqtotalMed = "select emailComprador, count(*) as nrMed from comprador where codPermissao=2  and LEIComprador='$LEIComprador'";


  $resultmeds = $conn->query($sqtotalMed);

  if ($resultmeds->num_rows > 0) {
    // output data of each row

    while($row = $resultmeds->fetch_assoc()) {
      $nrMed = $row["nrMed"];

    }

  } else {
    echo "Error2";
  }

  if($nrMed!=0){
    echo '<br><br><div><canvas id="bar-chart-horizontal" width="1000%" height="200%"></canvas></div>';
  }



  $sql2 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result2 = $conn->query($sql2);

  $sql22 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result22 = $conn->query($sql22);

  $sql222 = "select descriEspecialidade, COUNT(*) as nrMedicos from especialidade, comprador where comprador.codEspecialidade=especialidade.codEspecialidade and codPermissao=2 and LEIComprador='$LEIComprador' group by descriEspecialidade";
  $result222 = $conn->query($sql222);


  $sqltotalServ = "select emailComprador, count(*) as nrIntr from servico, comprador where servico.codComprador=comprador.codComprador and codPermissao=2 and LEIComprador='$LEIComprador'";
  $resultservs = $conn->query($sqltotalServ);

  if ($resultservs->num_rows > 0) {
    // output data of each row

    while($row = $resultservs->fetch_assoc()) {
      $nrservs = $row["nrIntr"];

    }

  } else {
    echo "Error2";
  }

  if($nrservs!=0){
    echo '<br><br><canvas id="bar-chart-horizontal2" width="1000%" height="100%"></canvas>';
  }



  $sql3 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result3 = $conn->query($sql3);

  $sql33 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result33 = $conn->query($sql33);

  $sql333 = "select local.descriLocal, COUNT(*) as nrEsp from local, servico, comprador WHERE local.codLocal=servico.codLocal and comprador.codComprador=servico.codComprador and LEIComprador='$LEIComprador' GROUP BY local.descriLocal";
  $result333 = $conn->query($sql333);





  $conn->close();


  ?>

  </div>
    </div>





  </div>
</div>



 

        <!--grafico sexos -->
        

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
        

        <script>
          new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',

    data: {
      labels: [<?php
      if($result2->num_rows > 0){
          while($row = $result2->fetch_assoc()){
            if($row['descriEspecialidade'] != NULL){
            echo "'".$row['descriEspecialidade']."',";
          }
          }
      }
    ?>, 'Total'],
      datasets: [
        {
          label: "Número de médicos",
          backgroundColor: [<?php
      if($result222->num_rows > 0){
          while($row = $result222->fetch_assoc()){
            if($row['descriEspecialidade'] != NULL){
            echo "'#5fbace',";
          }
          }
      }
    ?>, '#5fbace'],
          data: [<?php
      if($result22->num_rows > 0){
          while($row = $result22->fetch_assoc()){
            if($row['descriEspecialidade'] != NULL){
            echo "'".$row['nrMedicos']."',";
          }
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
      },
      scales: {
        xAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                // OR //
                beginAtZero: true, // minimum value will be 0.
                stepSize: 1
            }
        }]
      }
    },

});

        </script>
        <br>
        <br>

        <!--grafico de locais-->

        

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
          label: "Número de intervenções",
          backgroundColor: [<?php
      if($result333->num_rows > 0){
          while($row = $result333->fetch_assoc()){
            echo "'#FF4848',";
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
        text: 'Número de intervenções por local'
      },
      scales: {
        xAxes: [{
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

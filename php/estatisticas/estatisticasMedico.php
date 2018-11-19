<!DOCTYPE html>
<html>
<head>
  <?php
  include('../topos/topo_medico.php');
  ?>

</head>
<body>
  <?php

  $sql = "select nomeUtente, sexoUtente from comprador, utente, associados where associados.comprador_codComprador=comprador.codComprador and associados.utente_ccUtente=utente.ccUtente";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $contagem_masculino=0;
    $contagem_feminino=0;
    $contagem_outro=0;
    $contagem_nd=0;
    while($row = $result->fetch_assoc()) {

      $nomeUtente = $row["nomeUtente"];

      $sexoUtente = $row["sexoUtente"]; 

            
      if(strpos($sexoUtente, "Masculino") == true){
        $contagem_masculino++;
      }
      else if (strpos($sexoUtente, "Feminino") == true){
        $contagem_feminino++;
      }
      else if (strpos($sexoUtente, "Outro") == true){
        $contagem_outro++;
      }
      else{
        $contagem_nd++;        
      }    
    }
  } else {
    echo "Error";
  }


  

  $sql2 = "select titularAIM, count(*) as nrtits from medicamento group by titularAIM";
  $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0) {    

    while($row = $result->fetch_assoc()) {

      $titular = $row["titularAIM"];

      $tits = $row["nrtits"];
    }
  } else {
    echo "Error";
  }


  $conn->close();

 

  ?>  



  <!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">


    <div class="row">
      <div class="col-md-12">
        <div id="piechart" style="width: 900px; height: 500px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Sexo', 'Quantidade'],
        ['Masculino',     <?php echo $contagem_masculino ?>],
        ['Feminino',      <?php echo $contagem_feminino ?>],        
        ['Outro',    <?php echo $contagem_outro ?>],
        ['Sem nenhuma informação',    <?php echo $contagem_nd ?>]
        ]);

        var options = {
        title: '% Sexo dos utentes associados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
        </script>





        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="chart_div" style="width: 900px; height: 500px;"></div>
        <script>
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
          var data = google.visualization.arrayToDataTable([
            ['titular AIM', 'nr tits',],
            <?php
            for($i=0; $i<sizeof($titular); $i++){              
            ?> 
              ['<?php echo $titular[$i] ?>', '<?php echo $tits[$i] ?>'],
            <?php } ?>          

          ];

          var options = {
            title: 'Population of Largest U.S. Cities',
            chartArea: {width: '50%'},
            hAxis: {
              title: 'Total Population',
              minValue: 0
            },
            vAxis: {
              title: 'olá'
            }
          };

          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

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
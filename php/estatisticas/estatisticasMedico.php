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
        title: '% Sexo dos utentes associados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }
        </script>





        <div id="chart_div" style="width: 1170px; height: 5900px;"></div>

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
            title: '% Estatísticas Titulares AIM',
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

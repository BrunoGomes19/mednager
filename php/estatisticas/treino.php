google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000]
      ]);

      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }











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






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
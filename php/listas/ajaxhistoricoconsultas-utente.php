
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

  <script>

  function x(a,b,c,d,e,f,g,h,i){

    document.getElementById('cod').innerHTML = "Informações da intervenção #"+a;

    document.getElementById('descricao').innerHTML = b;

    document.getElementById('start').innerHTML = c;

    document.getElementById('end').innerHTML = d;

    document.getElementById('preco').innerHTML = e+" €";

    document.getElementById('nomemedico').innerHTML = f;

    document.getElementById('local').innerHTML = g;

    document.getElementById("hiperl").href="../perfis/perfil_utentelista.php?cc="+h;

    document.getElementById('observacoes').innerHTML = i;

  }

  </script>


<?php

include('../topos/header.php');

$emailA = $_SESSION['email'];

$op = $_GET['op'];

if($op==1){

  $sql = "SELECT * FROM utente where emailUtente='$emailA'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $cc = $row['ccUtente'];


      }
  } else {
      echo "0 results";
  }

  $sql2 = "select servico.observacoes,comprador.ccComprador,servico.id,servico.title,servico.start,servico.end,comprador.nomeComprador,servico.pvpServico,descriLocal from comprador, servico, local where servico.codLocal = local.codLocal and servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.start<now() order by servico.start desc;";
  $result2 = $conn->query($sql2);




  echo '


  <table class="table table-data2">
      <thead>
      <tr>
          <th></th>
          <th>Serviço</th>
          <th>Data e hora de início</th>
          <th>Médico</th>
          <th></th>
      </tr>
      </thead>
      <tbody>


  ';

  while($row = $result2->fetch_assoc()) {

    $codServico = $row['id'];

    $descriServico = $row['title'];

    $start = $row['start'];

    $end = $row['end'];

    $pvpServico = $row['pvpServico'];

    $nomeMedico = $row['nomeComprador'];

    $descriLocal = $row['descriLocal'];

    $ccComprador = $row['ccComprador'];

    $observacoes = $row['observacoes'];


    echo '<tr class="tr-shadow">
        <td></td>
        <td>'.$descriServico.'</td>
        <td>
            <span class="block-email">'.$start.'</span>
        </td>
        <td class="desc">'.$nomeMedico.'</td>

        <td title="Ver mais informações">


                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" onclick="x('.$codServico.',\'' . str_replace("'", "\'", $descriServico) . '\',\'' . str_replace("'", "\'", $start) . '\',\'' . str_replace("'", "\'", $end) . '\','.$pvpServico.',\'' . str_replace("'", "\'", $nomeMedico) . '\',\'' . str_replace("'", "\'", $descriLocal) . '\','.$ccComprador.',\'' . str_replace("'", "\'", $observacoes) . '\');">
                    <i class="fas fa-info"></i></button>

        </td>
    </tr>
    <tr class="spacer"></tr>';
  }




  echo '

  </div>






  </tbody>
  </table>



  ';

  if ($result->num_rows == 0 || $result2->num_rows == 0) {

    echo '<br>
      <tr>Sem resultados!</tr>


    ';


  }

}else{

  if($op==2){

    $q = $_GET["q"];

      $sql = "SELECT * FROM utente where emailUtente='$emailA'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $cc = $row['ccUtente'];


          }
      } else {
          echo "0 results";
      }
//select servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador,servico.pvpServico,servico.duracaoServico,descriLocal from comprador, servico, local where servico.codLocal = local.codLocal and servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.dataHoraServico<now();
      $sql2 = "select servico.observacoes,comprador.ccComprador,servico.id,servico.title,servico.start,servico.end,comprador.nomeComprador,servico.pvpServico,descriLocal from comprador, servico, local where local.codLocal = servico.codLocal and servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.start between concat('".$q."',' 00:00:00') and concat('".$q."',' 23:59:59') order by servico.start desc;";
      $result2 = $conn->query($sql2);


      echo '


      <table class="table table-data2">
          <thead>
          <tr>
              <th></th>
              <th>Serviço</th>
              <th>Data e hora do início</th>
              <th>Médico</th>
              <th></th>
          </tr>
          </thead>
          <tbody>


      ';

      while($row = $result2->fetch_assoc()) {

        $codServico = $row['id'];

        $descriServico = $row['title'];

        $start = $row['start'];

        $end = $row['end'];

        $pvpServico = $row['pvpServico'];

        $nomeMedico = $row['nomeComprador'];

        $descriLocal = $row['descriLocal'];

        $ccComprador = $row['ccComprador'];

        $observacoes = $row['observacoes'];


        echo '<tr class="tr-shadow">
            <td></td>
            <td>'.$descriServico.'</td>
            <td>
                <span class="block-email">'.$start.'</span>
            </td>
            <td class="desc">'.$nomeMedico.'</td>

            <td title="Ver mais informações">


                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" onclick="x('.$codServico.',\'' . str_replace("'", "\'", $descriServico) . '\',\'' . str_replace("'", "\'", $start) . '\',\'' . str_replace("'", "\'", $end) . '\','.$pvpServico.',\'' . str_replace("'", "\'", $nomeMedico) . '\',\'' . str_replace("'", "\'", $descriLocal) . '\','.$ccComprador.',\'' . str_replace("'", "\'", $observacoes) . '\');">
                        <i class="fas fa-info"></i></button>

            </td>
        </tr>
        <tr class="spacer"></tr>';
      }




      echo '

      </div>






      </tbody>
      </table>

      ';

      if ($result->num_rows == 0 || $result2->num_rows == 0) {

        echo '<br>
          <tr>Sem resultados!</tr>


        ';


      }

  }

}




if ($result->num_rows == 0) {

  echo '<br>
    <tr>Sem resultados!</tr>


  ';


}




mysqli_close($conn);
?>
</body>
</html>

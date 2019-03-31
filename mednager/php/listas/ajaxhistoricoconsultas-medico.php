
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

    document.getElementById('nomeutente').innerHTML = f;

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

  $sql = "SELECT * FROM comprador where emailComprador='$emailA'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

      $codComprador = $row['codComprador'];


      }
  } else {
      echo "0 results";
  }

  $sql2 = "select servico.observacoes,servico.id,servico.title,servico.start,servico.end,utente.ccUtente,utente.nomeUtente,servico.pvpServico,descriLocal from comprador, servico, local, utente, associados where associados.comprador_codComprador=comprador.codComprador and associados.utente_ccUtente = utente.ccUtente and utente.ccUtente = servico.ccUtente and servico.codLocal = local.codLocal and servico.codComprador = comprador.codComprador and servico.codComprador = '$codComprador' and servico.end<now() order by servico.end desc;";
  $result2 = $conn->query($sql2);




  echo '


  <table class="table table-data2">
      <thead>
      <tr>
        <th></th>
        <th>Serviço</th>
        <th>Data e hora do início</th>
        <th>Utente</th>
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

    $nomeUtente = $row['nomeUtente'];

    $descriLocal = $row['descriLocal'];

    $ccutente = $row['ccUtente'];

    $observacoes = $row['observacoes'];


    echo '<tr class="tr-shadow">
        <td></td>
        <td>'.$descriServico.'</td>
        <td>
            <span class="block-email">'.$start.'</span>
        </td>
        <td class="desc">'.$nomeUtente.'</td>

        <td title="Ver mais informações">


                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" onclick="x('.$codServico.',\'' . str_replace("'", "\'", $descriServico) . '\',\'' . str_replace("'", "\'", $start) . '\',\'' . str_replace("'", "\'", $end) . '\','.$pvpServico.',\'' . str_replace("'", "\'", $nomeUtente) . '\',\'' . str_replace("'", "\'", $descriLocal) . '\','.$ccutente.',\'' . str_replace("'", "\'", $observacoes) . '\');">
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

}else{

  if($op==2){

    $q = $_GET["q"];

      $sql = "SELECT * FROM comprador where emailComprador='$emailA'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $codComprador = $row['codComprador'];


          }
      } else {
          echo "0 results";
      }
//select servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador,servico.pvpServico,servico.duracaoServico,descriLocal from comprador, servico, local where servico.codLocal = local.codLocal and servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.dataHoraServico<now();
      $sql2 = "select servico.observacoes,servico.id,servico.title,servico.start,servico.end,utente.nomeUtente,comprador.nomeComprador,servico.pvpServico,descriLocal,utente.ccUtente from utente,comprador, servico, local, associados where associados.comprador_codComprador=comprador.codComprador and associados.utente_ccUtente = utente.ccUtente and utente.ccUtente = servico.ccUtente and local.codLocal = servico.codLocal and servico.codComprador = comprador.codComprador and servico.codComprador = '$codComprador' and servico.end<now() and NIFUtente like '".$q."%' order by servico.start desc;";

      //  //$sql="SELECT * FROM utente WHERE NIFUtente like '".$q."%' ORDER BY nomeUtente limit 4";


      $result2 = $conn->query($sql2);


      echo '


      <table class="table table-data2">
          <thead>
          <tr>
              <th></th>
              <th>Serviço</th>
              <th>Data e hora do início</th>
              <th>Utente</th>
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

        $nomeUtente = $row['nomeUtente'];

        $descriLocal = $row['descriLocal'];

        $ccutente = $row['ccUtente'];

        $observacoes = $row['observacoes'];


        echo '<tr class="tr-shadow">
            <td></td>
            <td>'.$descriServico.'</td>
            <td>
                <span class="block-email">'.$start.'</span>
            </td>
            <td class="desc">'.$nomeUtente.'</td>

            <td title="Ver mais informações">


                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" onclick="x('.$codServico.',\'' . str_replace("'", "\'", $descriServico) . '\',\'' . str_replace("'", "\'", $start) . '\',\'' . str_replace("'", "\'", $end) . '\','.$pvpServico.',\'' . str_replace("'", "\'", $nomeUtente) . '\',\'' . str_replace("'", "\'", $descriLocal) . '\','.$ccutente.',\'' . str_replace("'", "\'", $observacoes) . '\');">
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

  }

}




if ($result->num_rows == 0 || $result2->num_rows == 0) {

  echo '<br>
    <tr>Sem resultados!</tr>


  ';


}




mysqli_close($conn);
?>
</body>
</html>

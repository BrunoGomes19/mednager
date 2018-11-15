
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

  <script>

  function x(a,b,c,d,e,f,g,h,i,j){

    document.getElementById('cod').innerHTML = "Informações da intervenção #"+a;

    document.getElementById('descricao').innerHTML = b;

    document.getElementById('datahora').innerHTML = c;

    document.getElementById('preco').innerHTML = d+" €";

    document.getElementById('duracao').innerHTML = e+" h";

    document.getElementById('nomemedico').innerHTML = f;

    document.getElementById('local').innerHTML = g;

    document.getElementById("hiperl").href="../perfis/perfil_utentelista.php?cc="+h;


    document.getElementById('nomeutente').innerHTML = i;

    document.getElementById("hiperl2").href="../perfis/perfil_adminutentelista.php?cc="+j;


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

        $ccComprador = $row['ccComprador'];

        $LEIComprador = $row['LEIComprador'];


      }
  } else {
      echo "0 results";
  }

  $sql2 = "select servico.ccUtente,utente.nomeUtente,comprador.ccComprador,servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador,servico.pvpServico,servico.duracaoServico,descriLocal from comprador, servico, local, utente where utente.ccUtente = servico.ccUtente and servico.codLocal = local.codLocal and servico.codComprador = comprador.codComprador and comprador.LEIComprador = '$LEIComprador' and servico.dataHoraServico<now() order by servico.dataHoraServico desc;";
  $result2 = $conn->query($sql2);




  echo '


  <table class="table table-data2">
      <thead>
      <tr>
          <th></th>
          <th>Serviço</th>
          <th>Data e hora</th>
          <th>Médico</th>
          <th>Utente</th>
          <th></th>
      </tr>
      </thead>
      <tbody>


  ';

  while($row = $result2->fetch_assoc()) {

    $codServico = $row['codServico'];

    $descriServico = $row['descriServico'];

    $dataHoraServico = $row['dataHoraServico'];

    $pvpServico = $row['pvpServico'];

    $duracaoServico = $row['duracaoServico'];

    $nomeMedico = $row['nomeComprador'];

    $descriLocal = $row['descriLocal'];

    $ccComprador = $row['ccComprador'];

    $ccUtente = $row['ccUtente'];

    $nomeUtente = $row['nomeUtente'];


    echo '<tr class="tr-shadow">
        <td></td>
        <td>'.$descriServico.'</td>
        <td>
            <span class="block-email">'.$dataHoraServico.'</span>
        </td>
        <td class="desc">'.$nomeMedico.'</td>

        <td class="desc">'.$nomeUtente.'</td>

        <td title="Ver mais informações">


                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" onclick="x('.$codServico.',\'' . str_replace("'", "\'", $descriServico) . '\',\'' . str_replace("'", "\'", $dataHoraServico) . '\','.$pvpServico.','.$duracaoServico.',\'' . str_replace("'", "\'", $nomeMedico) . '\',\'' . str_replace("'", "\'", $descriLocal) . '\','.$ccComprador.',\'' . str_replace("'", "\'", $nomeUtente) . '\','.$ccUtente.');">
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

      $sql = "SELECT * FROM comprador where emailComprador='$emailA'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

                    $ccComprador = $row['ccComprador'];

                    $LEIComprador = $row['LEIComprador'];

          }
      } else {
          echo "0 results";
      }
//select servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador,servico.pvpServico,servico.duracaoServico,descriLocal from comprador, servico, local where servico.codLocal = local.codLocal and servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.dataHoraServico<now();
      $sql2 = "select utente.nomeUtente, servico.ccUtente, comprador.ccComprador,servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador,servico.pvpServico,servico.duracaoServico,descriLocal from comprador, servico, local, utente where utente.ccUtente = servico.ccUtente and local.codLocal = servico.codLocal and servico.codComprador = comprador.codComprador and comprador.LEIComprador = '$LEIComprador' and servico.dataHoraServico<now() and NIFComprador like '".$q."%' order by servico.dataHoraServico desc;";
      $result2 = $conn->query($sql2);


      echo '


      <table class="table table-data2">
          <thead>
          <tr>
              <th></th>
              <th>Serviço</th>
              <th>Data e hora</th>
              <th>Médico</th>
              <th>Utente</th>
              <th></th>
          </tr>
          </thead>
          <tbody>


      ';

      while($row = $result2->fetch_assoc()) {

        $codServico = $row['codServico'];

        $descriServico = $row['descriServico'];

        $dataHoraServico = $row['dataHoraServico'];

        $pvpServico = $row['pvpServico'];

        $duracaoServico = $row['duracaoServico'];

        $nomeMedico = $row['nomeComprador'];

        $descriLocal = $row['descriLocal'];

        $ccComprador = $row['ccComprador'];

        $ccUtente = $row['ccUtente'];

        $nomeUtente = $row['nomeUtente'];


        echo '<tr class="tr-shadow">
            <td></td>
            <td>'.$descriServico.'</td>
            <td>
                <span class="block-email">'.$dataHoraServico.'</span>
            </td>
            <td class="desc">'.$nomeMedico.'</td>

            <td class="desc">'.$nomeUtente.'</td>

            <td title="Ver mais informações">


                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" onclick="x('.$codServico.',\'' . str_replace("'", "\'", $descriServico) . '\',\'' . str_replace("'", "\'", $dataHoraServico) . '\','.$pvpServico.','.$duracaoServico.',\'' . str_replace("'", "\'", $nomeMedico) . '\',\'' . str_replace("'", "\'", $descriLocal) . '\','.$ccComprador.',\'' . str_replace("'", "\'", $nomeUtente) . '\','.$ccUtente.');">
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


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>


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

  $sql2 = "select servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador from comprador, servico where servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.dataHoraServico<now();";
  $result2 = $conn->query($sql2);




  echo '


  <table class="table table-data2">
      <thead>
      <tr>
          <th></th>
          <th>Serviço</th>
          <th>Data e hora</th>
          <th>Médico</th>
          <th></th>
      </tr>
      </thead>
      <tbody>


  ';

  while($row = $result2->fetch_assoc()) {

    $descriServico = $row['descriServico'];

    $dataHoraServico = $row['dataHoraServico'];

    $nomeMedico = $row['nomeComprador'];

    $codServico = $row['codServico'];






    echo '<tr class="tr-shadow">
        <td></td>
        <td>'.$descriServico.'</td>
        <td>
            <span class="block-email">'.$dataHoraServico.'</span>
        </td>
        <td class="desc">'.$nomeMedico.'</td>

        <td title="Ver mais informações">

                <button class="btn btn-outline-primary" onclick="modal('.$codServico.');">
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

      $sql2 = "select servico.codServico,servico.descriServico,servico.dataHoraServico,comprador.nomeComprador from comprador, servico where servico.codComprador = comprador.codComprador and servico.ccUtente = '$cc' and servico.dataHoraServico between concat('".$q."',' 00:00:00') and concat('".$q."',' 23:59:59');";
      $result2 = $conn->query($sql2);


      echo '


      <table class="table table-data2">
          <thead>
          <tr>
              <th></th>
              <th>Serviço</th>
              <th>Data e hora</th>
              <th>Médico</th>
              <th></th>
          </tr>
          </thead>
          <tbody>


      ';

      while($row = $result2->fetch_assoc()) {

        $descriServico = $row['descriServico'];

        $dataHoraServico = $row['dataHoraServico'];

        $nomeMedico = $row['nomeComprador'];

        $codServico = $row['codServico'];



        echo '<tr class="tr-shadow">
            <td></td>
            <td>'.$descriServico.'</td>
            <td>
                <span class="block-email">'.$dataHoraServico.'</span>
            </td>
            <td class="desc">'.$nomeMedico.'</td>

            <td title="Ver mais informações">

                    <button class="btn btn-outline-primary" onclick="modal('.$codServico.');">
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




if ($result->num_rows == 0) {

  echo '<br>
    <tr>Sem resultados!</tr>


  ';


}




mysqli_close($conn);
?>
</body>
</html>

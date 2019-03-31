
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = intval($_GET['q']);

include "../topos/header.php";

$sql="SELECT * FROM utente WHERE NIFUtente like '".$q."%' ORDER BY nomeUtente limit 4";
$result = mysqli_query($conn,$sql);

$emailA = $_SESSION['email'];

$sql3 = "Select * from comprador where emailComprador='$emailA'";
$result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $codComprador = $row['codComprador'];
    }
}

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>
            Associar
            </th>
            <th>Nome</th>
            <th>NIF</th>
            <th>Localidade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['nomeUtente'];

$cc = $row['ccUtente'];

$nif = $row['NIFUtente'];

$localidade = $row['localidadeUtente'];


$sql2 = "Select * from associados where associados.utente_ccUtente = '$cc' and associados.comprador_codComprador = '$codComprador';";
$result3 = $conn->query($sql2);




echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>';


      if ($result3->num_rows > 0) {
          // output data of each row
          while($row = $result3->fetch_assoc()) {

            if($row['confirmacao'] == 0){

              echo '
              <button class="btn btn-warning btn-sm" style="font-size:16px;color:white;background-color:#ff751a;" title="Clique para desassociar" onclick="associacaoPendente('.$cc.','.$codComprador.')";>
                <i class="fas fa-user-friends"></i>
              </button>&nbsp';

            }else{

              echo '
              <button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para desassociar" onclick="desassociar('.$cc.','.$codComprador.')";>
                <i class="fas fa-times"></i>
              </button>&nbsp';

            }



          }
      } else {

        echo '<button class="btn btn-primary btn-sm" style="font-size:16px" title="Clique para associar" onclick="associar('.$cc.','.$codComprador.')";>
            <i class="fas fa-check"></i>
        </button>&nbsp';

      }








      echo ' </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$nif.'</span>
      </td>
      <td class="desc">'.$localidade.'</td>

      <td>';
      $sql2 = "Select * from associados where associados.utente_ccUtente = '$cc' and associados.comprador_codComprador = '$codComprador';";
      $result3 = $conn->query($sql2);
      if ($result3->num_rows > 0) {
          // output data of each row
          while($row = $result3->fetch_assoc()) {

            if($row['confirmacao'] == 1){

              echo '
              <button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
                  <i class="fa fa-user"></i>&nbsp;Perfil</button>
                  <button class="btn btn-outline-primary" onclick="planoMedAssociado('.$cc.');" >
                      <i class="fa fa-calendar-plus"></i>&nbsp;Plano</button>';

            }else{

            echo '  <button class="btn btn-outline-primary" onclick="planoMedPendente('.$cc.');" >
                  <i class="fa fa-calendar-plus"></i>&nbsp;Plano</button>';

            }



          }
      } else {

      }









      echo '</td>
  </tr>
  <tr class="spacer"></tr>
';
}




echo '

</div>






</tbody>
</table>

';


if ($result->num_rows == 0) {

  echo '<br>
    <tr>Sem resultados!</tr>


  ';

}

mysqli_close($conn);
?>
</body>
</html>

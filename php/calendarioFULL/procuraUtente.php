
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = $_GET['q'];


include('../topos/header.php');

$sql="SELECT * FROM utente,associados WHERE utente.ccUtente = associados.utente_ccUtente and nomeUtente like '".$q."%' ORDER BY nomeUtente limit 4";
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

            <th>Nome</th>
            <th> &nbsp &nbsp &nbsp &nbsp &nbsp NIF</th>
            <th>Localidade</th>

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
  <tr class="tr-shadow" id="HoverTR" style="text-align:center;" onclick="guardaCC('.$cc.');">
    ';

      echo '
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$nif.'</span>
      </td>
      <td class="desc">'.$localidade.'</td>


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

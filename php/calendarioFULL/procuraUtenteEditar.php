
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = $_GET['q'];

$con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utente WHERE nomeUtente like '".$q."%' ORDER BY nomeUtente limit 4";
$result = mysqli_query($con,$sql);

session_start();

$emailA = $_SESSION['email'];

$sql3 = "Select * from comprador where emailComprador='$emailA'";
$result2 = $con->query($sql3);

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
            <th>Cartão de cidadão</th>
            <th>NIF</th>

        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['nomeUtente'];

$cc = $row['ccUtente'];

$nif = $row['NIFUtente'];




$sql2 = "Select * from associados where associados.utente_ccUtente = '$cc' and associados.comprador_codComprador = '$codComprador';";
$result3 = $con->query($sql2);




echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow" id="HoverTR" onclick="guardaCCEditar('.$cc.');">
    ';

      echo '
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$cc.'</span>
      </td>
      <td class="desc">'.$nif.'</td>


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

mysqli_close($con);
?>
</body>
</html>

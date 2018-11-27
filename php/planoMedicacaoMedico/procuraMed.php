
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
$sql="SELECT * FROM medicamento WHERE nomeMedicamento like '".$q."%' or nomeGenerico like '".$q."%' ORDER BY nomeMedicamento limit 4";
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

            <th>Nome Medicamento</th>
            <th>Nome genérico</th>
            <th>Forma farmacêutica</th>
            <th>Dosagem</th>
            <th>Genérico</th>

        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

  $codMedicamento = = $row['codMedicamento'];

$nomeMedicamento = $row['nomeMedicamento'];

$nomeGenerico = $row['nomeGenerico'];

$formaFarmaceutica = $row['formaFarmaceutica'];

$dosagem = $row['dosagem'];

$generico = $row['generico'];



$sql2 = "Select * from medicamentos ;";
$result3 = $con->query($sql2);




echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow" onclick="guardaMed('.$codMedicamento.');">
    ';

      echo '
      <td>'.$nomeMedicamento.'</td>
      <td>'.$nomeGenerico.'</td>
      <td>
          <span class="block-email">'.$formaFarmaceutica.'</span>
      </td>
      <td class="desc">'.$dosagem.'</td>
      <td>'.$generico.'</td>



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

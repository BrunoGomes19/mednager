
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = $_GET['q'];

function tirarAcentos($q){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$q);

}

$q = tirarAcentos($q);

$con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
  $sql="SELECT * from medicamento where nomeMedicamento like '".$q."%' limit 50";
$result = mysqli_query($con,$sql);

if ($result->num_rows == 0) {

  $sql="SELECT * from medicamento where nomeGenerico like '".$q."%' limit 50";

   mysqli_select_db($con,"ajax_demo");
   $result = mysqli_query($con,$sql);

}

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

            <th>Nome do genérico</th>
            <th>Nome do medicamento</th>
            <th>Forma farmacêutica</th>
            <th>Dosagem</th>

        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nomeGenerico = $row['nomeGenerico'];

$nomeMedicamento = $row['nomeMedicamento'];

$formaFarmaceutica = $row['formaFarmaceutica'];

$dosagem = $row['dosagem'];

$codMedicamento = $row['codMedicamento'];


echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow" id="HoverTR" style="text-align:center;" onclick="guardaMedicamento('.$codMedicamento.',\'' . str_replace("'", "\'", $nomeMedicamento) . '\');">
    ';

      echo '
      <td>'.$nomeGenerico.'</td>
      <td>
          <span class="block-email">'.$nomeMedicamento.'</span>
      </td>
      <td class="desc">'.$formaFarmaceutica.'</td>
      <td class="desc">'.$dosagem.'</td>


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

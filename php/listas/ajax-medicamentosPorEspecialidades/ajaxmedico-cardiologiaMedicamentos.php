
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

</head>
<body>

<?php

$q = intval($_GET['q']);

$con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT especialidade.descriEspecialidade, medicamento.descriMedicamento from medicamento, medicamentoespecialidade, especialidade where medicamento.codMedicamento=medicamentoespecialidade.codMedicamento and especialidade.codEspecialidade=medicamentoespecialidade.codEspecialidade and descriMedicamento like '".$q."%'";


$result = mysqli_query($con,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>
                <label class="au-checkbox">
                    <input type="checkbox">
                    <span class="au-checkmark"></span>
                </label>
            </th>
            <th>Nome</th>
            <th>Especialidade</th>
            
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['medicamento.descriMedicamento'];
$descri = $row['especialidade.descriEspecialidade']





echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>
          <label class="au-checkbox">
              <input type="checkbox">
              <span class="au-checkmark"></span>
          </label>
      </td>
      <td>'.$nome.'</td>
      <td>'.$descri.'</td>
      
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
  <tr><td>Sem resultados!<td></tr>';

}

mysqli_close($con);
?>
</body>
</html>


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
$sql="SELECT * FROM registocampos, especialidade WHERE especialidade.codEspecialidade = registocampos.codEspecialidade and nomeCampo like '".$q."%' ORDER BY nomeCampo limit 4";
$result = mysqli_query($con,$sql);

session_start();

echo '


<table class="table table-data2">
    <thead>
        <tr>

            <th>Nome</th>
            <th>Unidade</th>
            <th>Especialidade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nomeCampo = $row['nomeCampo'];

$unidadeCampo = $row['unidadeCampo'];

$descriEspecialidade = $row['descriEspecialidade'];

$codRegistoCampos = $row['codRegistoCampos'];

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">

      <td>'.$nomeCampo.'</td>
      <td>
          <span class="block-email">'.$unidadeCampo.'</span>
      </td>
      <td class="desc">'.$descriEspecialidade.'</td>';

      echo '<td><button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para eliminar este campo" onclick="removerCampo('.$codRegistoCampos.')";>
        <i class="fas fa-times"></i>
      </button>&nbsp</td>';



  echo '</tr>
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

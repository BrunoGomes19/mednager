
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = $_GET['q'];

include "../topos/header.php";

$sql="SELECT * FROM categorias WHERE nomeCategoria like '".$q."%' ORDER BY nomeCategoria limit 4";
$result = mysqli_query($conn,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>

            <th>Nome</th>
            <th></th>
            <th></th><th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nomeCategoria = $row['nomeCategoria'];

$idcategoria = $row['idcategoria'];


echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">

      <td>'.$nomeCategoria.'</td>
      <td></td><td></td><td></td>';

      echo '<td><button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para eliminar esta categoria" onclick="removerCateg('.$idcategoria.')";>
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

mysqli_close($conn);
?>
</body>
</html>

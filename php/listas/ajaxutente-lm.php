
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

</head>
<body>

<?php

$q = intval($_GET['q']);

include "../topos/header.php";

$sql="SELECT * FROM comprador,especialidade WHERE comprador.codEspecialidade = especialidade.codEspecialidade and codPermissao=2 and NIFComprador like '".$q."%' ORDER BY nomeComprador";
$result = mysqli_query($conn,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>

            </th>
            <th>Nome</th>
            <th>NIF</th>
            <th>Especialidade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['nomeComprador'];

$cc = $row['ccComprador'];

$nif = $row['NIFComprador'];

$descriEspecialidade = $row['descriEspecialidade'];

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>

      </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$nif.'</span>
      </td>
      <td class="desc">'.$descriEspecialidade.'</td>

      <td>

              <button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
                  <i class="fa fa-user"></i>&nbsp;Perfil</button>

      </td>
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

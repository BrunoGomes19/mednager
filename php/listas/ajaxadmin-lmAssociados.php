
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

</head>
<body>

<?php

$q = intval($_GET['q']);

include "../topos/header.php";

  $emailA = $_SESSION['email'];

  $sql = "SELECT * from comprador where emailComprador like '$emailA'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $LEIComprador = $row['LEIComprador'];

    }
  }

$sql="SELECT * FROM comprador WHERE NIFComprador like '".$q."%' and comprador.codPermissao=2 and comprador.associacao = 2 and comprador.LEIComprador = $LEIComprador ORDER BY nomeComprador;";
$result = mysqli_query($conn,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>

            </th>
            <th>Nome</th>
            <th>Cartão de cidadão</th>
            <th>NIF</th>
            <th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['nomeComprador'];

$cc = $row['ccComprador'];

$nif = $row['NIFComprador'];

$email = $row['emailComprador'];

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>

      </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$cc.'</span>
      </td>
      <td class="desc">'.$nif.'</td>

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

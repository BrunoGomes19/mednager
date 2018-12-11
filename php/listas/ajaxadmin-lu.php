
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = intval($_GET['q']);

include "../topos/header.php";

$email = $_SESSION['email'];

$sql = "SELECT * FROM comprador where emailComprador = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $LEIComprador = $row['LEIComprador'];
    }
} else {
    echo "0 results";
}

$sql="SELECT * FROM utente,comprador,associados WHERE utente.ccUtente = associados.utente_ccUtente and associados.comprador_codComprador = comprador.codComprador and LEIComprador = $LEIComprador and associados.confirmacao=1 and NIFUtente like '".$q."%' group by utente.ccUtente ORDER BY nomeUtente";

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

$nome = $row['nomeUtente'];

$cc = $row['ccUtente'];

$nif = $row['NIFUtente'];

$confirmacao = $row['confirmacao'];

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

      <td>';

      if($confirmacao == 1){

        echo '  <button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
              <i class="fa fa-user"></i>&nbsp;Perfil</button>';

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

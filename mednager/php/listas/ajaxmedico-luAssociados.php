
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

    $codComprador = $row['codComprador'];

    }
  }





$sql="SELECT * FROM utente,associados WHERE associados.utente_ccUtente = utente.ccUtente and associados.comprador_codComprador = $codComprador and associados.confirmacao = 1 and NIFUtente like '".$q."%' ORDER BY nomeUtente limit 4;";
$result = mysqli_query($conn,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>

            </th>
            <th>Nome</th>
            <th>NIF</th>
            <th>Localidade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$nome = $row['nomeUtente'];

$cc = $row['ccUtente'];

$nif = $row['NIFUtente'];

$localidade = $row['localidadeUtente'];

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>

      </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$nif.'</span>
      </td>
      <td class="desc">'.$localidade.'</td>

      <td>

              <button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
                  <i class="fa fa-user"></i>&nbsp;Perfil</button>

                  <button class="btn btn-outline-primary" onclick="planoMed('.$cc.')";>
                      <i class="fa fa-calendar-plus"></i>&nbsp;Plano</button>

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

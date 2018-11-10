
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

$q = intval($_GET['q']);

$con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

session_start();

  $emailA = $_SESSION['email'];

  $sql = "SELECT * from utente where emailUtente like '$emailA'";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $ccUtente = $row['ccUtente'];

    }
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM comprador,associados WHERE associados.comprador_codComprador = comprador.codComprador and associados.utente_ccUtente = $ccUtente and comprador.codPermissao = 2 and NIFComprador like '".$q."%' ORDER BY nomeComprador limit 4;";

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

mysqli_close($con);
?>
</body>
</html>

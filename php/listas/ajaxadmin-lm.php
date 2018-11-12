
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
$sql="SELECT * FROM comprador WHERE NIFComprador like '".$q."%' and comprador.codPermissao=2 ORDER BY nomeComprador";
$result = mysqli_query($con,$sql);

session_start();

$emailA = $_SESSION['email'];

$sql3 = "Select * from comprador where emailComprador='$emailA'";
$result2 = $con->query($sql3);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $codComprador = $row['codComprador'];
        $LEIComprador = $row['LEIComprador'];
    }
}

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>Associar</th>
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

$sql2 = "Select * from comprador where comprador.LEIComprador = '$LEIComprador' and ccComprador = '$cc';";
$result3 = $con->query($sql2);

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>';

      if ($result3->num_rows > 0) {
          // output data of each row
          while($row = $result3->fetch_assoc()) {


            echo '
            <button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para desassociar" onclick="desassociar('.$cc.','.$LEIComprador.')";>
              <i class="fas fa-times"></i>
            </button>&nbsp';

          }
      } else {

        echo '<button class="btn btn-primary btn-sm" style="font-size:16px" title="Clique para associar" onclick="associar('.$cc.','.$LEIComprador.')";>
            <i class="fas fa-check"></i>
        </button>&nbsp';

      }


    echo'  </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$cc.'</span>
      </td>
      <td class="desc">'.$nif.'</td>

      <td>

              <button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
                  <i class="fa fa-user"></i>&nbsp;Perfil</button>
                  <button type="button" class="btn btn-outline-danger">
                       <i class="fa fa-trash"></i>&nbsp; Remover</button>

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


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php

$q = intval($_GET['q']);

include "../topos/header.php";

$sql="SELECT * FROM comprador,especialidade WHERE comprador.codEspecialidade = especialidade.codEspecialidade and NIFComprador like '".$q."%' and comprador.codPermissao=2 ORDER BY nomeComprador";
$result = mysqli_query($conn,$sql);

$emailA = $_SESSION['email'];

$sql3 = "Select * from comprador where emailComprador='$emailA'";
$result2 = $conn->query($sql3);

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

$sql2 = "Select * from comprador where comprador.LEIComprador = '$LEIComprador' and ccComprador = '$cc';";
$result3 = $conn->query($sql2);

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow">
      <td>';

      if ($result3->num_rows > 0) {
          // output data of each row
          while($row = $result3->fetch_assoc()) {

            $associacao = $row['associacao'];

            if($associacao == 1){


              echo '
              <button class="btn btn-warning btn-sm" style="font-size:16px;color:white;background-color:#ff751a;" title="Pedido pendente" onclick="associacaoPendente('.$cc.','.$codComprador.')";>
                <i class="fas fa-user-friends"></i>
              </button>&nbsp';

            }else if($associacao == 2){

              echo '
              <button class="btn btn-danger btn-sm" style="font-size:16px" title="Clique para desassociar" onclick="desassociar('.$cc.')";>
                <i class="fas fa-times"></i>
              </button>&nbsp';

            }



          }
      } else {

        $sql22 = "Select * from comprador where ccComprador = '$cc';";
        $result33 = $conn->query($sql22);

        if ($result33->num_rows > 0) {
            // output data of each row
            while($row = $result33->fetch_assoc()) {

              $test = $row['LEIComprador'];

              if($test == NULL){

                echo '<button class="btn btn-primary btn-sm" style="font-size:16px" title="Clique para associar" onclick="associar('.$cc.','.$LEIComprador.')";>
                    <i class="fas fa-check"></i>
                </button>&nbsp';

              }

            }

        }




      }


    echo'  </td>
      <td>'.$nome.'</td>
      <td>
          <span class="block-email">'.$nif.'</span>
      </td>
      <td class="desc">'.$descriEspecialidade.'</td>

      <td>';

      $sql2 = "Select * from comprador where comprador.LEIComprador = '$LEIComprador' and ccComprador = '$cc';";
      $result3 = $conn->query($sql2);

      if ($result3->num_rows > 0) {

        while($row = $result3->fetch_assoc()) {

          if($associacao == 2){

            echo '<button class="btn btn-outline-primary" onclick="verperfil('.$cc.');">
                <i class="fa fa-user"></i>&nbsp;Perfil</button>';

          }


        }
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

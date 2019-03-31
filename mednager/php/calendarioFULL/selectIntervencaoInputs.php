<?php

include "../topos/header.php";

  $idservico = $_REQUEST["idintervencao"];

$codComprador = $_SESSION["codComprador"];
$lei = "SELECT LEIComprador,associacao,emailComprador from comprador where codComprador = $codComprador";
$resultlei = $conn->query("$lei");

if ($resultlei->num_rows > 0) {
    // output data of each row
    while($row = $resultlei->fetch_assoc()) {


      $email = $row['emailComprador'];

        $leiMed = $row["LEIComprador"];

        $associacao = $row["associacao"];

        if($leiMed != null){

          if($associacao==2){

        $leiadmin = "SELECT codComprador from comprador where LEIComprador = $leiMed and codPermissao = 1";
        $resultlei2 = $conn->query("$leiadmin");

        if ($resultlei2->num_rows > 0) {
            // output data of each row
            while($row = $resultlei2->fetch_assoc()) {

                $codCompLei = $row["codComprador"];
                $sqlcampo = "SELECT DISTINCT codRegistoCampos, nomeCampo, unidadeCampo, codEspecialidade, codComprador from registoCampos where codEspecialidade =(SELECT distinct codEspecialidade from comprador where emailComprador = '".$email."' ) and codComprador = $codCompLei";
                $resultcampo = $conn->query($sqlcampo);
            }
        } else {
            echo "0 results";
        }
      }
      }
    }
} else {
    echo "0 results";
}

  $a = 0;
if($leiMed != null){
  if($associacao==2){
  $sqlextrasEditar = "SELECT DISTINCT registodados.codRegistoCampos, nomeCampo, unidadeCampo, codEspecialidade, codComprador, valorDados from registoCampos,registodados where codEspecialidade =(SELECT distinct codEspecialidade from comprador where emailComprador = '".$email."' ) and codComprador = $codCompLei and registodados.codRegistoCampos = registocampos.codRegistoCampos  and codServico = $idservico";
    $resultextrasEditar = $conn->query($sqlextrasEditar);

if ($resultextrasEditar->num_rows > 0) {
  // output data of each row
  while($row = $resultextrasEditar->fetch_assoc()) {

    $nomeCampo = $row['nomeCampo'];

    $codRegistoCampo = $row['codRegistoCampos'];

    $unidadeCampo = $row['unidadeCampo'];

    $valorDados = $row['valorDados'];

    $a++;

      echo "<div class='form-group'>
          <div class='form-group col-md-12'>
              <label>".$nomeCampo." ";

               if($unidadeCampo==""){

               }else{

                 echo " ($unidadeCampo)";

               }

                 echo "</label>
              <input type='text' class='form-control' name='extraEditar$a' value='$valorDados' required>
              <input type='hidden' name='codEditar$a' value='".$codRegistoCampo."'>
          </div>
      </div>";

  }

  $sqlq = "SELECT DISTINCT *, count(*) as quantidade from registoCampos where codEspecialidade =(SELECT distinct codEspecialidade from comprador where emailComprador = '".$email."' ) and codComprador = $codCompLei";
    $resultq = $conn->query($sqlq);

    if ($resultq->num_rows > 0) {
        // output data of each row
        while($row = $resultq->fetch_assoc()) {

          $quantidade = $row['quantidade'];

          echo "<input type='hidden' name='quantidade' value='$quantidade'>";

          echo "<div class='form-group'>
              <div class='form-group col-md-12'>



              </div>
          </div>";

        }
    }

}
}
}
?>

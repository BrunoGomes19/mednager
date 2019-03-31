<?php

include('../topos/header.php');

$idservico = $_REQUEST["idintervencao"];
$sqlextras = "select * from servico, registodados, registocampos where servico.id = registodados.codServico and registodados.codRegistoCampos = registocampos.codRegistoCampos and registodados.codServico = '$idservico';";
  $resultextras = $conn->query($sqlextras);

  if ($resultextras->num_rows > 0) {
      // output data of each row
      while($row = $resultextras->fetch_assoc()) {
          $nomeCampo = $row['nomeCampo'];
          $valorDados = $row['valorDados'];
          $unidadeCampo = $row['unidadeCampo'];

          echo '

          <dt style="max-width:100%" class="col-sm-3">'.$nomeCampo.'';

          if($unidadeCampo==""){

          }else{

            echo " ($unidadeCampo)";

          }


          echo '</dt>
          <dd class="col-sm-9">'.$valorDados.'</dd>

          ';

      }
  }

 ?>

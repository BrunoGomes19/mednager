<?php

$x = $_GET['op'];


if($x == 1){ //assoc aceite utente

  $utenteconfirmacao = $_GET['utenteconfirmacao'];

  $sql = "UPDATE alertaComprador SET estadoComprador=1 WHERE id=$idAssoc";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

} else if ($x==2){ //pedido assoc admin
  $plano = $_GET['plano'];

  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE idAssoc=null";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

}
 ?>

<?php
include("header.php");

$x = $_GET['op'];
$idAssoc = $_GET['idAssoc'];


if($x == 1){ //assoc aceite utente



  $sql = "UPDATE alertaComprador SET estadoComprador=1 WHERE idAssoc=$idAssoc";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

} else if ($x==2){ //pedido assoc admin


  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE idAssoc=null";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

}
 ?>

<?php

$x = $_GET['op'];


if($x == 1){

  $servico = $_GET['servico'];

  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE id=$servico";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

} else if ($x==2){
  $plano = $_GET['plano'];

  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE id=$plano";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

} else if ($x==3){
  $idAssoc = $_GET['idAssoc'];

  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE id=$idAssoc";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

}
 ?>

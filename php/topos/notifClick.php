<?php
include("header.php");
$x = $_GET['op'];


if($x == 1){ //int

  $servico = $_GET['servico'];
  echo "<script> alert($servico);</script>";
  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE servico_id=$servico";

  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

} else if ($x==2){
  $plano = $_GET['plano'];

  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE planoMedicacao_id=$plano";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

} else if ($x==3){
  $idAssoc = $_GET['idAssoc'];

  $sql = "UPDATE alertaUtente SET estadoUtente=1 WHERE idAssoc=$idAssoc";
  $result = $conn->query($sql);

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

}
 ?>

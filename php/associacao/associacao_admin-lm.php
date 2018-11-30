<?php

include('../topos/header.php');

$ccComprador = $_GET['cc'];

$LEIComprador = $_GET['lei'];

$codComprador = $_SESSION['codComprador'];


$sql = "SELECT * from comprador where codComprador=$codComprador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $quantidadeMedicos = $row['quantidadeMedicos'];

    }
}



$sql = "select count(*) as quantidade from comprador where LEIComprador=$LEIComprador and codComprador!=$codComprador;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $quantidadeQuery = $row['quantidade'];

    }
}

if($quantidadeQuery<$quantidadeMedicos){

  $sql = "UPDATE comprador set LEIComprador='$LEIComprador' WHERE ccComprador='$ccComprador'";

  $conn->query($sql);

  if ($conn->query($sql) === TRUE) {

    header("Location: ../listas/admin-lm.php?alertassociado");
  } else {
    echo "Error updating record: " . $conn->error;
  }

}else{

  header("Location: ../listas/admin-lm.php?limite");

}



?>

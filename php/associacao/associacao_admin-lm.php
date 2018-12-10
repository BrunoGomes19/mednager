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

  $sql = "UPDATE comprador set LEIComprador='$LEIComprador', associacao = 1 WHERE ccComprador='$ccComprador'";

  $conn->query($sql);

  if ($conn->query($sql) === TRUE) {

    $ccAssoc = "SELECT codComprador from comprador where ccComprador = $ccComprador";
    $resccAssoc = $conn->query($ccAssoc);
    while($row = $resccAssoc->fetch_assoc()) {
      $codAss = $row['codComprador'];

    $notif = "INSERT INTO alertacomprador(codAlertaComprador, descriAlertaComprador, estadoComprador, codComprador, dataAlertaComprador, idAssoc) VALUES(null, null, 0, $codAss, now(), null)";
  }
    if ($conn->query($notif) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $notif . "<br>" . $conn->error;
    }

    $_SESSION['msgAssociacao'] = '<script>

    bootbox.alert("Pedido de associação pendente!");


    </script>';

    header("Location: ../listas/admin-lm.php");

    exit();

  } else {
    echo "Error updating record: " . $conn->error;
  }

}else{

  $_SESSION['msgAssociacao'] = '<script>

  bootbox.alert("Chegou ao seu limite de associações!");


  </script>';

  header("Location: ../listas/admin-lm.php");

  exit();

}



?>

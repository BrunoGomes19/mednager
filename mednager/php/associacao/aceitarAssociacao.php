<?php

include('../topos/header.php');

@session_start();

$codComprador = $_GET['cod'];

$ccUtente = $_GET['cc'];

$sql = "UPDATE associados set confirmacao = 1 where utente_ccUtente=$ccUtente and comprador_codComprador = $codComprador;";




if ($conn->query($sql) === TRUE) {

  $qualId = "SELECT idAssoc from associados where utente_ccUtente=$ccUtente and comprador_codComprador = $codComprador;";
  $resultId = $conn->query($qualId);

  while($row = $resultId->fetch_assoc()) {
    $idAss = $row['idAssoc'];
  $notif = "INSERT INTO alertacomprador(codAlertaComprador, descriAlertaComprador, estadoComprador, codComprador, dataAlertaComprador, idAssoc) VALUES(null, null, 0, $codComprador, now(), $idAss)";
  if ($conn->query($notif) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $notif . "<br>" . $conn->error;
  }


}

  $_SESSION['msg'] = '<script>

    bootbox.alert("Pedido de associação aceite!");


  </script>';

  header("Location: ../listas/utente-listaPedidos.php");

  exit();



} else {
    echo "Error updating record: " . $conn->error;
}


?>

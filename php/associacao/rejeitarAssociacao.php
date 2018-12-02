<?php

include('../topos/header.php');

$codComprador = $_GET['cod'];

$ccUtente = $_GET['cc'];

$sql = "DELETE FROM associados WHERE comprador_codComprador='$codComprador' and utente_ccUtente = '$ccUtente';";


if ($conn->query($sql) === TRUE) {

  $_SESSION['msg'] = '<script>

    bootbox.alert("Pedido de associação rejeitado!");


  </script>';

  header("Location: ../listas/utente-listaPedidos.php");

  exit();



} else {
    echo "Error updating record: " . $conn->error;
}


?>

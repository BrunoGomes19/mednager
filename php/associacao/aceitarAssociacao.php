<?php

include('../topos/header.php');

@session_start();

$codComprador = $_GET['cod'];

$ccUtente = $_GET['cc'];

$sql = "UPDATE associados set confirmacao = 1 where utente_ccUtente=$ccUtente and comprador_codComprador = $codComprador;";


if ($conn->query($sql) === TRUE) {


  $_SESSION['msg'] = '<script>

    bootbox.alert("Pedido de associação aceite!");


  </script>';

  header("Location: ../listas/utente-listaPedidos.php");

  exit();



} else {
    echo "Error updating record: " . $conn->error;
}


?>

<?php

include('../topos/header.php');

@session_start();

$codComprador = $_GET['cod'];

$sql = "UPDATE comprador set associacao = 2 where comprador.codComprador = $codComprador;";


if ($conn->query($sql) === TRUE) {


  $_SESSION['msg'] = '<script>

    bootbox.alert("Pedido de associação aceite!");


  </script>';

  header("Location: ../listas/medico-listaPedidos.php");

  exit();



} else {
    echo "Error updating record: " . $conn->error;
}


?>

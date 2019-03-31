<?php

include('../topos/header.php');

$codComprador = $_GET['cod'];

$sql = "UPDATE comprador set LEIComprador='' , associacao = 0 WHERE codComprador=$codComprador";


if ($conn->query($sql) === TRUE) {

  $_SESSION['msg'] = '<script>

    bootbox.alert("Pedido de associação rejeitado!");


  </script>';

  header("Location: ../listas/medico-listaPedidos.php");

  exit();



} else {
    echo "Error updating record: " . $conn->error;
}


?>

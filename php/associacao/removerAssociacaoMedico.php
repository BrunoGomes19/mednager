<?php

include('../topos/header.php');

$codComprador = $_GET['cod'];

$sql = "UPDATE comprador set associacao = 0 , LEIComprador='' where codComprador = $codComprador;";


if ($conn->query($sql) === TRUE) {

  $_SESSION['msg'] = '<script>

    bootbox.alert("Coletivo desassociado com sucesso!");


  </script>';

  header("Location: ../listas/medico-listaPedidos.php");

  exit();



} else {
    echo "Error updating record: " . $conn->error;
}


?>

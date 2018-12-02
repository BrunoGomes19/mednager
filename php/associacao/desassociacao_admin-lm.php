<?php

include('../topos/header.php');

$ccComprador = $_GET['cc'];

$LEIComprador = $_GET['lei'];

$sql = "UPDATE comprador set LEIComprador='' WHERE ccComprador='$ccComprador'";

$conn->query($sql);

if ($conn->query($sql) === TRUE) {

  $_SESSION['msgAssociacao'] = '<script>

  bootbox.alert("Médico desassociado com sucesso!");


  </script>';

  header("Location: ../listas/admin-lm.php");


} else {
  echo "Error updating record: " . $conn->error;
}

?>

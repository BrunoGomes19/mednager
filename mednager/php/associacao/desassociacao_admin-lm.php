<?php

include('../topos/header.php');

$ccComprador = $_GET['cc'];

$sql = "UPDATE comprador set LEIComprador='' , associacao = 0 WHERE ccComprador='$ccComprador'";

$conn->query($sql);

if ($conn->query($sql) === TRUE) {

  $_SESSION['msgAssociacao'] = '<script>

  bootbox.alert("Médico desassociado com sucesso!");


  </script>';

  header("Location: ../listas/admin-lm.php");

  exit();

} else {
  echo "Error updating record: " . $conn->error;
}

?>

<?php

include('../topos/header.php');

$cod = $_GET['cod'];

$sql = "DELETE FROM registocampos WHERE codRegistoCampos='$cod';";


if ($conn->query($sql) === TRUE) {

  $_SESSION['msgCampo'] = '<script>

    bootbox.alert("Campo removido com sucesso!");


  </script>';

  header("Location: config-espec.php");

  exit();



} else {
  $_SESSION['msgCampo'] = '<script>

    bootbox.alert("Ocorreu um erro a remover este campo!");


  </script>';

  header("Location: config-espec.php");

  exit();
}


?>

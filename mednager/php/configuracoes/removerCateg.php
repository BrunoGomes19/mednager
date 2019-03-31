<?php

include('../topos/header.php');

$cod = $_GET['cod'];

$sql = "DELETE FROM categorias WHERE idcategoria='$cod';";


if ($conn->query($sql) === TRUE) {

  $_SESSION['msgCampo'] = '<script>

    bootbox.alert("Categoria removida com sucesso!");


  </script>';

  header("Location: addCategorias.php");

  exit();



} else {
  $_SESSION['msgCampo'] = '<script>

    bootbox.alert("Ocorreu um erro a remover esta categoria!");


  </script>';

  header("Location: addCategorias.php");

  exit();
}


?>

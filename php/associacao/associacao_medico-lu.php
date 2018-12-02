<?php

include('../topos/header.php');

$codComprador = $_GET['cod'];

$ccUtente = $_GET['cc'];

$sql = "INSERT into associados(comprador_codComprador,utente_ccUtente) values('$codComprador','$ccUtente');";

$query = mysqli_query($conn,$sql);

if($query){

  $_SESSION['msgAssociacao'] = '<script>

  bootbox.alert("Utente associado com sucesso!");


  </script>';

  header("Location: ../listas/medico-lu.php");

  exit();
}

?>

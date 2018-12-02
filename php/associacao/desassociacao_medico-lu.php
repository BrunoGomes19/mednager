<?php

include('../topos/header.php');

$codComprador = $_GET['cod'];

$ccUtente = $_GET['cc'];

$sql = "DELETE FROM associados WHERE comprador_codComprador='$codComprador' and utente_ccUtente = '$ccUtente';";

$query = mysqli_query($conn,$sql);

if($query){

  $_SESSION['msgAssociacao'] = '<script>

  bootbox.alert("Utente desassociado com sucesso!");


  </script>';

  header("Location: ../listas/medico-lu.php");

  exit();
}

?>

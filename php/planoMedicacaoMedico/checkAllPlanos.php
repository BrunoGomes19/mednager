<?php

include "../topos/header.php";

  $cc = $_GET['cc'];

  $codComprador = $_SESSION['codComprador'];

  $sql = "DELETE FROM planomedicacao WHERE ccUtente=$cc and codComprador = $codComprador";

  $sql = "UPDATE planomedicacao SET confirmacaoplano=1 WHERE ccUtente = $cc and codComprador = $codComprador and start<now();";

if ($conn->query($sql) === TRUE) {

  $_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Todos os planos de medicação deste utente foram marcados como tomados!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
  //echo "<script> alert('OK');</script>";

header("Location: index.php?cc=$ccUtente");

exit();

} else {

  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao confirmar todos os planos de medicação deste utente!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	//echo "<script> alert('Erro - datas invalidas');</script>";

	header("Location: index.php?cc=$ccUtente");

	exit();

    echo "Error deleting record: " . $conn->error;
}


 ?>

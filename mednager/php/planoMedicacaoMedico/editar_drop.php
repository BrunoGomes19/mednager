<?php

include('../topos/header.php');

$codComprador = $_SESSION['codComprador'];

$id = $_GET['id'];

$start_sem_barra = $_GET['start'];

$end_sem_barra = $_GET['end'];

$sql = "UPDATE planomedicacao SET start='$start_sem_barra', end='$end_sem_barra' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    	$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>A data do plano de medicação foi alterada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

      exit();

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>

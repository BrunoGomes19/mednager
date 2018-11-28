<?php

include('../topos/header.php');

$codComprador = $_SESSION['codComprador'];

$id = $_GET['id'];

$start_sem_barra = $_GET['start'];

$end_sem_barra = $_GET['end'];

$sql = "UPDATE planomedicacao SET start='$start_sem_barra', end='$end_sem_barra' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>

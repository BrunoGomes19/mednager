<?php

include('../topos/header.php');

$codComprador = $_SESSION['codComprador'];

$id = $_GET['id'];

$start_sem_barra = $_GET['start'];

$end_sem_barra = $_GET['end'];


$sql = "SELECT * FROM servico where id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $title = $row['title'];

      $color = $row['color'];

      $pvpServico = $row['pvpServico'];

      $nSala = $row['nSala'];

      $ccUtente = $row['ccUtente'];

      $codTipoServico = $row['codTipoServico'];

      $codLocal = $row['codLocal'];

    }
}

$sql = "UPDATE servico SET title='$title', color='$color', start='$start_sem_barra', end='$end_sem_barra', pvpServico = $pvpServico, nSala = $nSala, codComprador = $codComprador, ccUtente = $ccUtente, codTipoServico = $codTipoServico, codLocal = $codLocal, codAlertaComprador = 1, codAlertaUtente = 1  WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>

<?php

include('../topos/header.php');

$id = $_GET['id'];

$sql = "UPDATE planomedicacao SET confirmacaoplano=1 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>

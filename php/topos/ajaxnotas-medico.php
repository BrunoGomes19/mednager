<?php

include('header.php');

echo "<script>alert();</script>";

$notas = $_GET['q'];

$emailA = $_SESSION['email'];

$sql = "UPDATE comprador SET notas='$notas' WHERE emailComprador='$emailA'";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>

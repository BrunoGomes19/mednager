<?php

include('../topos/header.php');

$ccComprador = $_GET['cc'];

$LEIComprador = $_GET['lei'];

$sql = "UPDATE comprador set LEIComprador='$LEIComprador' WHERE ccComprador='$ccComprador'";

$conn->query($sql);

if ($conn->query($sql) === TRUE) {

  header("Location: ../listas/admin-lm.php?alertassociado");
} else {
  echo "Error updating record: " . $conn->error;
}

?>

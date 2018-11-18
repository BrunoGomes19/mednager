<?php

include('header.php');

$notas = $_GET['q'];

$op = $_GET['op'];

$emailA = $_SESSION['email'];

if($op==1){

  $sql = "UPDATE comprador SET notas='$notas' WHERE emailComprador='$emailA'";

  if ($conn->query($sql) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }

}else if($op==2){

  $sql = "UPDATE utente SET notas='$notas' WHERE emailUtente='$emailA'";

  if ($conn->query($sql) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }

}



$conn->close();


 ?>

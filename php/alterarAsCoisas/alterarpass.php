<?php
include('../topos/header.php');

	$emailComprador=$_SESSION['email'];

	$sqlpass = "select passComprador from comprador where emailComprador='$emailComprador'";

	$resultpass = $conn->query($sqlpass);

  if ($resultpass->num_rows > 0) {
   
	  while($row = $resultpass->fetch_assoc()) {
	      $password = $row["passComprador"];
	  }

  } else {
  echo "Error";
  }

  
  if (isset($_POST["velhapass"]) && isset($_POST["novapass"]) && isset($_POST["novapassConfirmacao"])) {
  	$velhapass=$_POST['velhapass'];
  	$novapass=$_POST['novapass'];
  	$novapassConfirmacao=$_POST['novapassConfirmacao'];
  }

  
?>
<?php
include('../topos/header.php');

  $velhapass = $_POST["velhapass"];

  $novapass = $_POST["novapass"];

  $novapassConfirmacao = $_POST["novapassConfirmacao"];

  $emailComprador = $_SESSION['email'];

	$sqlpass = "select passComprador from comprador where emailComprador='$emailComprador'";

	$resultpass = $conn->query($sqlpass);

  if ($resultpass->num_rows > 0) {
   
	  while($row = $resultpass->fetch_assoc()) {
	      $password = $row["passComprador"];
	  }

  } else {
  echo "Error";
  }
  


  if ( md5($velhapass) == $password) {
        mysqli_query($conn, "UPDATE comprador set passComprador='" . md5($novapass) . "' WHERE emailComprador='$emailComprador'");

        $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span style="color:white;">Palavra-passe alterada com sucesso.</span>
       </div>';

       header("Location: alterarAsCoisas.php");

       exit();

    }
  
?>
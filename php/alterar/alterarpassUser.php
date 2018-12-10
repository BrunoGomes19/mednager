<?php
include('../topos/header.php');

  $velhapass = $_POST["velhapass"];

  $novapass = $_POST["novapass"];

  $novapassConfirmacao = $_POST["novapassConfirmacao"];

  $emailUtente = $_SESSION['email'];

	$sqlpass = "select passUtente from utente where emailUtente='$emailUtente'";

	$resultpass = $conn->query($sqlpass);

  if ($resultpass->num_rows > 0) {
   
	  while($row = $resultpass->fetch_assoc()) {
	      $password = $row["passUtente"];
	  }

  } else {
  echo "Error";
  }


  if(md5($velhapass)==$password && md5($novapassConfirmacao)==$password){
    $_SESSION['erro'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#ff3333;border-radius:8px";>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span style="color:white;">As passwords nova e antiga são iguais.</span>
     </div>';
     header("Location: changesUser.php");         

      exit();


  }
  
  


  if ( md5($velhapass) == $password) {   
    if($novapass == $novapassConfirmacao){
    mysqli_query($conn, "UPDATE utente set passUtente='" . md5($novapass) . "' WHERE emailUtente='$emailUtente'"); 

      $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span style="color:white;">Password alterada com sucesso.</span>
     </div>';

      header("Location: changesUser.php");         

      exit();
    }else{      
      $_SESSION['erro'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#ff3333;border-radius:8px";>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span style="color:white;">As passwords não coincidem. Tente novamente.</span>
     </div>';
     header("Location: changesUser.php");         

      exit();
    }

  }else{    
    $_SESSION['erro'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#ff3333;border-radius:8px";>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span style="color:white;">A password antiga está errada.</span>
     </div>';
     header("Location: changesUser.php");         

      exit();
  }
  
?>
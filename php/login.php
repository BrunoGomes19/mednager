<?php

if(isset($_POST['submit'])){

	$servername='localhost';
	$username = 'admin';
	$password = 'Sutas4Ever2018';
	$bd = 'mydb';
	$conn = mysqli_connect($servername, $username, $password, $bd);
	
	
		session_start(); //fundamental para configurar para 'o futuro' a variavel de sessao

	$user = $_POST["username"];
	$pass = $_POST["password"];
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
				
	//Fazer a distinção de comprador para utente (comprador tem @ e utente não)
	
	if (!preg_match("/@/",$user)) {
  
	//Procurar se é um utente
  
	$sql1 = "SELECT * from utente where ccUtente like '$user'";
	$result = $conn->query($sql1);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
			if( $row["passUtente"] == md5($pass)){ 
			
				$_SESSION['login_user']=$row["nomeUtente"]; //esta var.
				//
				//echo $_SESSION['login_user'];
				
				$_SESSION['email']=$row["emailUtente"]; //esta var.
				
				//echo $_SESSION['email'];
				
				$_SESSION['sexo']=$row["sexoUtente"]; //esta var.
			
				//echo "<br><br>Login efetuado com sucesso - UTENTE" ;
				
				header("Location: ../Interior/index-utente.php");
				
				//
					
					exit();
				
			}else{
				
					//echo "<br><br>Password errada - UTENTE" ;
					
					header("Location: ../html/ltr/authentication-login.php?signup=uerror&user=$user");
					
					exit();
					
			}
			
			
		}
	} else {
		header("Location: ../html/ltr/authentication-login.php?signup=oerror");
	}
  
}else{
	
	//Procurar se é um comprador
	
	$sql2 = "SELECT * from comprador where emailComprador like '$user'";
	$result = $conn->query($sql2);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo md5($row["passComprador"]);
			
			if( $row["passComprador"] == md5($pass)){ 
			
				echo "<br><br>Login efetuado com sucesso - COMPRADOR" ;
				
				if($row["codPermissao"] == 1){
					
					$_SESSION['login_user']=$row["nomeComprador"]; //esta var.
					
					$_SESSION['email']=$row["emailComprador"]; //esta var.
					
					$_SESSION['sexo']=$row["sexoComprador"]; //esta var.
				
				header("Location: ../Interior/index-admin.php");
					
					exit();
				
				}else{
					
					if($row["codPermissao"] == 2){
						
						$_SESSION['login_user']=$row["nomeComprador"]; //esta var.
						
						$_SESSION['email']=$row["emailComprador"]; //esta var.
						
						$_SESSION['sexo']=$row["sexoComprador"]; //esta var.
				
					header("Location: ../Interior/index-medico.php");
					
					exit();
				
				}
					
				}
					
			}else{
				
					header("Location: ../html/ltr/authentication-login.php?signup=cerror&user=$user");
					
					exit();
			}
			
		}
	} else {
		
		header("Location: ../html/ltr/authentication-login.php?signup=oerror");
		
	}
	
}
	
	$conn->close();

}else{
	
	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../html/ltr/authentication-login.php');
}
	
}
	
?>
<?php

	if(isset($_POST['submit'])){

	$email = $_POST["email"];

	$pass = $_POST["password"];
	
	$sexo = $_POST["sexo"];
	
	$nome = $_POST["nome"];

	$numeroOrdem = $_POST["numeroOrdem"];
	
	$confirmPassword = $_POST["confirmPassword"];
	
	session_start();
	
	
	if(!is_numeric($numeroOrdem)){
		
		header("Location: ../html/ltr/authentication-register.php?signup=noerror");
					
			exit();
		
	}

	if($sexo == "erro"){
		
		header("Location: ../html/ltr/authentication-register.php?signup=serror");
					
			exit();
		
	}
	
	
	if($pass != $confirmPassword){
		
		header("Location: ../html/ltr/authentication-register.php?signup=pperror");
					
			exit();
		
	}else{
		
	$servername = "localhost";
	$username = "admin";
	$password = "Sutas4Ever2018";
	$bd = "mydb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $bd);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
		
		$findemailu = false;
		
		$findemailc = false;
		
		$findno = false;
		
		//Comparar o email com o email dos utentes
		
			$sql5 = "SELECT emailUtente from utente";
			$result = $conn->query($sql5);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					
					if( $row["emailUtente"] == $email){ 
			
				echo "Este e-mail já existe no UTENTE" ;
				
				$findemailu = true;
				
					}
					
					
				}
			}
			
			
			//Comparar o email com o email dos compradores
		
			$sql6 = "SELECT * from comprador";
			$result = $conn->query($sql6);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					
					if( $row["emailComprador"] == $email){ 
					
					
					
					
			
					echo "Este e-mail já existe no COMPRADOR" ;
				
					$findemailc = true;
				
					}
					
					
				}
			}
			
			//Comparar o numero de ordem com outros
			
			$sql7 = "SELECT nrOrdem from comprador";
			$result = $conn->query($sql7);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					
					if( $row["nrOrdem"] == $numeroOrdem){ 
			
				echo "Este número de ordem já está registado noutro médico." ;
				
					$findno = true;
				
					}
					
					
				}
			}
			
			//se encontrar o email na tabela dos utentes ou compradores dar erro
			
			if($findemailc || $findemailu){
				
				header("Location: ../html/ltr/authentication-register.php?signup=emailerror");
					
				exit();
				
			}else{
				//se já houver um numero de ordem 
				if($findno){
				
				header("Location: ../html/ltr/authentication-register.php?signup=numeroordemerror");
					
				exit();
				
			}else{
				
				//INSERIR NA BD
		
		$sql = "INSERT into comprador(emailComprador,passComprador,nrOrdem,nomeComprador,sexoComprador,codEspecialidade,codPermissao,codAlertaComprador,estadoComprador) values('$email',md5('$pass'),$numeroOrdem,'$nome','$sexo',1,2,1,0);";
		
		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo
		
		$query = mysqli_query($conn,$sql);
		
		if($query){
			
					$_SESSION['login_user']= $nome; //esta var.
				
					$_SESSION['email']=$email; //esta var.
					
					$_SESSION['n_ordem']=$numeroOrdem; //esta var.
					
					$_SESSION['sexo']=$sexo; //esta var.
				
					
			
			
			//Variaveis de sessão
			
			
			header("Location: ../Interior/registomedico.php");
			
			exit();
			
		}else{
			
			header("Location: ../html/ltr/authentication-register.php?signup=cerror");
					
			exit();
			
		}
				
			}
				
			}
			
					
		
		
		echo mysqli_error($conn);
		
		$conn->close();
		
	}

	}else{
	
	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../html/ltr/authentication-login.php');
}
	}

?>

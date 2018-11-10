<?php

	if(isset($_POST['submit'])){

	$email = $_POST["email"];

	$pass = $_POST["password"];

	$sexo = $_POST["sexo"];

	$nome = $_POST["nome"];

	$numeroOrdem = $_POST["numeroOrdem"];

	$cc = $_POST["cc"];

	$confirmPassword = $_POST["confirmPassword"];

	session_start();


	if(!is_numeric($numeroOrdem)){

		header("Location: authentication-register.php?signup=noerror");

			exit();

	}

	if($sexo == "erro"){

		header("Location: authentication-register.php?signup=serror");

			exit();

	}


	if($pass != $confirmPassword){

		header("Location: authentication-register.php?signup=pperror");

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

		$findccU = false;

		$findccC = false;

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

			//Comparar o numero de cc com outros utente

			$sql13 = "SELECT ccUtente from utente";
			$result = $conn->query($sql13);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccUtente"] == $cc){

					$findccU = true;

					}


				}
			}

			//Comparar o numero de cc com outros comprador

			$sql14 = "SELECT ccComprador from comprador";
			$result = $conn->query($sql14);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {


					if( $row["ccComprador"] == $cc){

					$findccC = true;

					}


				}
			}

			//se encontrar o email na tabela dos utentes ou compradores dar erro

			if($findemailc || $findemailu){

				header("Location: authentication-register.php?signup=emailerror");

				exit();

			}else{
				//se já houver um numero de ordem
				if($findno){

				header("Location: authentication-register.php?signup=numeroordemerror");

				exit();

			}else{

				if($findccU || $findccC){

					header("Location: authentication-register.php?signup=ccerror");

					exit();

				}else{

				//INSERIR NA BD

		$sql = "INSERT into comprador(emailComprador,ccComprador,passComprador,nrOrdem,nomeComprador,sexoComprador,codEspecialidade,codPermissao,codAlertaComprador,estadoComprador) values('$email','$cc',md5('$pass'),$numeroOrdem,'$nome','$sexo',1,2,1,0);";

		//Criar especialidade 1 - novo | O comprador só insere a sua "especialidade" após a página de registo

		$query = mysqli_query($conn,$sql);

		if($query){

					$_SESSION['login_user']= $nome; //esta var.

					$_SESSION['email']=$email; //esta var.

					$_SESSION['n_ordem']=$numeroOrdem; //esta var.

					$_SESSION['sexo']=$sexo; //esta var.

					$_SESSION['permissao']=2;


			//Variaveis de sessão


			header("Location: registomedico.php");

			exit();

		}else{

			header("Location: authentication-register.php?signup=cerror");

			exit();

		}

			}
		}

			}




		echo mysqli_error($conn);

		$conn->close();

	}

	}else{

	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../logins/authentication-login.php');
}
	}

?>

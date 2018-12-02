<?php

@session_start();

if(isset($_POST['submit'])){

	$servername='localhost';
	$username = 'admin';
	$password = 'Sutas4Ever2018';
	$bd = 'mydb';
	$conn = mysqli_connect($servername, $username, $password, $bd);



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

				$emailconfirmUtente = $row["emailconfirmUtente"];

				if($emailconfirmUtente == 0){

					header("Location: ../erros/contaSuspensa.php");

				}else{

					 //fundamental para configurar para 'o futuro' a variavel de sessao


				$_SESSION['login_user']=$row["nomeUtente"]; //esta var.
				//
				//echo $_SESSION['login_user'];

				$_SESSION['email']=$row["emailUtente"]; //esta var.

				//echo $_SESSION['email'];

				$_SESSION['sexo']=$row["sexoUtente"]; //esta var.

				//echo "<br><br>Login efetuado com sucesso - UTENTE" ;

				$_SESSION['permissao'] = $row["codPermissao"];

				header("Location: ../indexes/index-utente.php");

				//

					exit();
				}
			}else{

					//echo "<br><br>Password errada - UTENTE" ;

					$_SESSION['msgLogin'] = '<p id="erro">Palavra-passe errada. Tente novamente ou clique em Esqueci-me da palavra-passe para a repor.<br><br></p>';

					header("Location: authentication-login.php");

			}


		}
	} else {

		$_SESSION['msgLogin'] = '<p id="erro">Não foi possível encontrar a sua conta!<br><br></p>';

		header("Location: authentication-login.php");

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

				$emailconfirmComprador = $row["emailconfirmComprador"];

				if($emailconfirmComprador == 0){

					header("Location: ../erros/contaSuspensa.php");

				}else{


				 //fundamental para configurar para 'o futuro' a variavel de sessao


				if($row["codPermissao"] == 1){

					if($row["estadoComprador"] == 0){

						$_SESSION['preco'] = $row['preco'];

						$_SESSION['quantidadeMedicos'] = $row['quantidadeMedicos'];

						$_SESSION['email']=$row["emailComprador"]; //esta var.

						header("Location: ../erros/pagamentoColetivo.php");

					}else{

					$_SESSION['login_user']=$row["nomeComprador"]; //esta var.

					$_SESSION['email']=$row["emailComprador"]; //esta var.

					$_SESSION['sexo']=$row["sexoComprador"]; //esta var.

					$_SESSION['n_ordem']=$row["nrOrdem"]; //esta var.

					$_SESSION['permissao']=$row["codPermissao"]; //esta var.

						$_SESSION['codComprador']=$row["codComprador"]; //esta var.

				header("Location: ../indexes/index-admin.php");

					exit();

				}

				}else{

					if($row["codPermissao"] == 2){

						if($row["estadoComprador"] == 0){

							$_SESSION['email']=$row["emailComprador"]; //esta var.

							header("Location: ../erros/pagamentoMedico.php");

						}else{

						$_SESSION['login_user']=$row["nomeComprador"]; //esta var.

						$_SESSION['email']=$row["emailComprador"]; //esta var.

						$_SESSION['sexo']=$row["sexoComprador"]; //esta var.

						$_SESSION['n_ordem']=$row["nrOrdem"]; //esta var.

						$_SESSION['permissao']=$row["codPermissao"]; //esta var.

						$_SESSION['codComprador']=$row["codComprador"]; //esta var.

					header("Location: ../indexes/index-medico.php");

					exit();

				}
				}

				}
			}



			}else{

					$_SESSION['msgLogin'] = '<p id="erro">Palavra-passe errada. Tente novamente ou clique em Esqueci-me da palavra-passe para a repor.<br><br></p>';

					header("Location: authentication-login.php");

			}

		}
	} else {

		$_SESSION['msgLogin'] = '<p id="erro">Não foi possível encontrar a sua conta!<br><br></p>';

		header("Location: authentication-login.php");

	}

}

	$conn->close();

}else{

	if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: authentication-login.php');
}

}

?>

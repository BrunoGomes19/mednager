<?php

	include('../topos/header.php');

	@session_start();

	$nomecompleto = $_POST['nomecompleto'];

	$email = $_SESSION['email'];

	$numeroOrdem = $_POST['numeroOrdem'];

	$sexo = $_POST['sexo'];

	$especialidade = $_POST['especialidade'];

	$codEspecialidade = $_POST['especialidade'];

	$date = $_POST['date'];

	$contacto1 = $_POST['contacto1'];

	$contacto2 = $_POST['contacto2'];

	$cc = $_POST['cc'];

	$nif = $_POST['nif'];

	$nib = $_POST['nib'];

	$morada = $_POST['morada'];

	$cidade = $_POST['cidade'];

	$codigopostal = $_POST['codigopostal'];

	$sobremim = $_POST['sobremim'];

	$foto = $_POST['foto'];

	//Verificar os campos: CC, Nif e número de ordem

	$findccU = false;

	$findccC = false;

	$findNIFU = false;

	$findNIFC = false;

	$findno = false;

	//Comparar o numero de cc com outros utente

	$sql11 = "SELECT ccUtente from utente where emailUtente!='$email';";
	$result = $conn->query($sql11);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {

					//$oldcc = $row["ccUtente"];

			if( $row["ccUtente"] == $cc){

			$findccU = true;



			}


		}
	}

	//Comparar o numero de cc com outros comprador

	$sql12 = "SELECT ccComprador from comprador where emailComprador!='$email'";
	$result = $conn->query($sql12);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {


			if( $row["ccComprador"] == $cc){

			$findccC = true;

			}


		}
	}

	//nif
	//Comparar o nif com outros utente

	$sql13 = "SELECT NIFUtente from utente where emailUtente!='$email';";
	$result = $conn->query($sql13);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {


			if( $row["NIFUtente"] == $nif){

			$findNIFU = true;

			}


		}
	}

	//Comparar o nif com outros comprador

	$sql14 = "SELECT NIFComprador from comprador where emailComprador!='$email'";
	$result = $conn->query($sql14);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {


			if( $row["NIFComprador"] == $nif){

			$findNIFC = true;

			}


		}
	}

	//Comparar o numero de ordem com o dos outros medicos

	$sql14 = "SELECT nrOrdem from comprador where emailComprador!='$email'";
	$result = $conn->query($sql14);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {


			if( $row["nrOrdem"] == $numeroOrdem){

			$findno = true;

			}


		}
	}

	//if nao encontrar nenhum dos 5 dá update

	if($findccC || $findccU){

		$_SESSION['msgRegistoCC'] = '<p id="erro">Este cartão de cidadão já está associado a outra conta.<br><br></p>';

		header("Location: registomedico.php");

	}else if($findNIFC || $findNIFU){

		$_SESSION['msgRegistoNIF'] = '<p id="erro">Este NIF já está associado a outra conta.<br><br></p>';

		header("Location: registomedico.php");


	}else if($findno){

		$_SESSION['msgRegistoNO'] = '<p id="erro">Este número de ordem já está associado a outra conta.<br><br></p>';

		header("Location: registomedico.php");


	}else{


		$sql = "UPDATE comprador set nrOrdem='$numeroOrdem',dataNascComprador='$date',nomeComprador = '$nomecompleto',formacaoCarreira='$sobremim',moradaComprador='$morada',codPostalComprador='$codigopostal',localidadeComprador='$cidade',NIBComprador='$nib',NIFComprador='$nif',contacto1Comprador='$contacto1',contacto2Comprador='$contacto2',ccComprador='$cc',sexoComprador='$sexo',codEspecialidade='$codEspecialidade' WHERE emailComprador='$email'";

		$conn->query($sql);

		echo "Perfil atualizado com sucesso!";

		if ($conn->query($sql) === TRUE) {

		header("Location: ../indexes/index-medico.php");

	} else {
	    echo "Error updating record: " . $conn->error;
	}
}

$conn->close();

?>

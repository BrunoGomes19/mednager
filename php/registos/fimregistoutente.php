<?php

	include('../topos/header.php');

	@session_start();

	$nomecompleto = $_POST['nomecompleto'];

	$email = $_SESSION['email'];

	$sexo = $_POST['sexo'];

	$date = $_POST['date'];

	$nrSubsistema = $_POST["nrSubsistema"];

	$Subsistema = $_POST["Subsistema"];

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

	//Verificar os campos: CC, Nif

	$findccU = false;

	$findccC = false;

	$findNIFU = false;

	$findNIFC = false;

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

	$sql12 = "SELECT ccComprador from comprador";
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

	$sql14 = "SELECT NIFComprador from comprador";
	$result = $conn->query($sql14);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {


			if( $row["NIFComprador"] == $nif){

			$findNIFC = true;

			}


		}
	}

	//if nao encontrar nenhum dos 4 dá update

if($findccC || $findccU){

	$_SESSION['msgEditarCC'] = '<p id="erro">Este cartão de cidadão já está associado a outra conta.<br><br></p>';

	header("Location: registoutente.php");

}else if($findNIFC || $findNIFU){

	$_SESSION['msgEditarNIF'] = '<p id="erro">Este NIF já está associado a outra conta.<br><br></p>';

	header("Location: registoutente.php");


}else{

	//$sql2 = "UPDATE associados set utente_ccUtente = '$cc' where utente_ccUtente='$oldcc'";

	//$conn->query($sql2);

	$sql = "UPDATE utente set codSubsistema = '$Subsistema', nrSubsistema='$nrSubsistema', dataNascUtente='$date',nomeUtente = '$nomecompleto',ObservacoesUtente='$sobremim',moradaUtente='$morada',codPostalUtente='$codigopostal',localidadeUtente='$cidade',NIBUtente='$nib',NIFUtente='$nif',contacto1Utente='$contacto1',contacto2Utente='$contacto2',ccUtente='$cc',sexoUtente='$sexo' WHERE emailUtente='$email'";

	$conn->query($sql);

	echo "Perfil atualizado com sucesso!";

	if ($conn->query($sql) === TRUE) {

	header("Location: ../indexes/index-utente.php");

} else {
    echo "Error updating record: " . $conn->error;
}

}




$conn->close();

?>

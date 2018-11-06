<?php

	include('header.php');

	$nomecompleto = $_POST['nomecompleto'];
	
	$email = $_SESSION['email'];
	
	$numeroOrdem = $_POST['numeroOrdem'];
	
	$sexo = $_POST['sexo'];
	
	$especialidade = $_POST['especialidade'];
	
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

	$conn->query("UPDATE comprador set nrOrdem='$numeroOrdem',dataNascComprador='$date',nomeComprador = '$nomecompleto',formacaoCarreira='$sobremim',moradaComprador='$morada',codPostalComprador='$codigopostal',localidadeComprador='$cidade',NIBComprador='$nib',NIFComprador='$nif',contacto1Comprador='$contacto1',contacto2Comprador='$contacto2',ccComprador='$cc',sexoComprador='$sexo',codEspecialidade='$especialidade' WHERE emailComprador='$email'");

	echo "Perfil atualizado com sucesso!";
	
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
	
?>
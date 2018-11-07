<?php

	include('../topos/header.php');

	$nomecompleto = $_POST['nomecompleto'];

	$email = $_SESSION['email'];

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

	$sql = "UPDATE utente set dataNascUtente='$date',nomeUtente = '$nomecompleto',ObservacoesUtente='$sobremim',moradaUtente='$morada',codPostalUtente='$codigopostal',localidadeUtente='$cidade',NIBUtente='$nib',NIFUtente='$nif',contacto1Utente='$contacto1',contacto2Utente='$contacto2',ccUtente='$cc',sexoUtente='$sexo' WHERE emailUtente='$email'";

	$conn->query($sql);

	echo "Perfil atualizado com sucesso!";

	if ($conn->query($sql) === TRUE) {

	header("Location: ../indexes/index-utente.php");

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>

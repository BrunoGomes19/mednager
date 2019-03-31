<?php

include("../topos/header.php");

$nome = $_GET["nome"];
$unid = $_GET["unid"];
$a = $_GET["a"];
$codComprador=$_SESSION['codComprador'];

$sql = "SELECT * FROM registoCampos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

			$nomeCampoBD = $row['nomeCampo'];

			$unidadeCampoBD = $row['unidadeCampo'];

			$codEspecialidadeBD = $row['codEspecialidade'];

			$codCompradorBD = $row['codComprador'];

			if(strtolower($nomeCampoBD) == strtolower($nome) && strtolower($unidadeCampoBD) == strtolower($unid) && strtolower($codEspecialidadeBD) == strtolower($a) && strtolower($codCompradorBD) == strtolower($codComprador)){

				echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#ff6666;border-radius:8px";>
	   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <span style="color:white;">Erro ao adicionar um novo campo!</span>';

			exit();

			}

    }
}


$sql = "INSERT INTO registoCampos values (null, '".$nome."', '".$unid."', '".$a."', ".$codComprador.")";

if ($conn->query($sql) === TRUE) {

	echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#58da81;border-radius:8px";>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <span style="color:white;">Campo adicionado com sucesso!</span>
	</div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

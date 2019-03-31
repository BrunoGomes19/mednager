<?php

include("../topos/header.php");

$nome = $_GET["nome"];

$nomeigual = "SELECT nomeCategoria from categorias";

$res2 = $conn->query($nomeigual);

if ($res2->num_rows > 0) {
    // output data of each row
    while($row = $res2->fetch_assoc()) {
			$nomeCategoria = $row['nomeCategoria'];
			if(strtolower($nomeCategoria) === strtolower($nome)){
				echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#f27676;border-radius:8px";>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <span style="color:white;">Nome já existente!</span> </div>';
				 exit();
			}
    }
}

$sql = "INSERT INTO categorias values (null, '".$nome."')";

if ($conn->query($sql) === TRUE) {

	echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#58da81;border-radius:8px";>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <span style="color:white;">Categoria adicionada com sucesso!</span>
	</div>';
} else {
	echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#f27676;border-radius:8px";>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <span style="color:white;">Erro ao adicionar categoria!</span> </div>';
}

$conn->close();

?>

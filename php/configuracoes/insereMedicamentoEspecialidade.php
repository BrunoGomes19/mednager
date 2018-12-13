
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>



<?php
include('../topos/header.php');

$codComprador = $_SESSION['codComprador'];

$codMedicamento = $_GET['codMedicamento'];
$esp = $_GET['esp'];


$sql = "INSERT INTO medicamentoEspecialidade (codMedicamento, codEspecialidade, codComprador)
VALUES ($codMedicamento, $esp, $codComprador)";

if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#58da81;border-radius:8px";>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <span style="color:white;">Medicamento associado com sucesso!</span>
  </div>';
} else {
     echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#ff6666;border-radius:8px";>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <span style="color:white;">Erro ao associar medicamento!</span>';
}

$conn->close();
?>
</body>
</html>

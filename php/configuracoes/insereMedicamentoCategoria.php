
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<?php
include('../topos/header.php');

$codMedicamento = $_GET['codMedicamento'];
$cat = $_GET['cat'];


$sql = "INSERT INTO medicamentoCategoria (codMedicamento, idcategoria)
VALUES ($codMedicamento, $cat)";

if ($conn->query($sql) === TRUE) {
  echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#58da81;border-radius:8px";>
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

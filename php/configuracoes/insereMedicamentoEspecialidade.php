
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

   

<?php
include('../topos/header.php');

$codMedicamento = $_GET['codMedicamento'];
$esp = $_GET['esp'];


$sql = "INSERT INTO medicamentoEspecialidade (codMedicamento, codEspecialidade)
VALUES ($codMedicamento, $esp)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>





<?php


include("../topos/header.php");

$nome = $_GET["nome"];
$unid = $_GET["unid"];
 $obs = $_GET["obs"];
  $a = $_GET["a"];
$codComprador=$_SESSION['codComprador'];

$sql = "INSERT INTO registoCampos values (null, '$nome', '$unid', '$obs', $a, $codComprador)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

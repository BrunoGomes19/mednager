<?php

include('../topos/header.php');

$codComprador = $_SESSION['codComprador'];

$id = $_GET['id'];

$start_sem_barra = $_GET['start'];

$end_sem_barra = $_GET['end'];


$sql = "SELECT * FROM servico where id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $title = $row['title'];

      $color = $row['color'];

      $pvpServico = $row['pvpServico'];

      $nSala = $row['nSala'];

      $ccUtente = $row['ccUtente'];

      $codTipoServico = $row['codTipoServico'];

      $codLocal = $row['codLocal'];

    }
}

$findDataHora = false;

$sql = "SELECT * FROM servico where id!=$id and (ccUtente=$ccUtente or codComprador=$codComprador) and ((('$start_sem_barra' between servico.start and servico.end) OR ('$end_sem_barra' between servico.start and servico.end)) or ((servico.start between '$start_sem_barra' and '$end_sem_barra') OR (servico.end between '$start_sem_barra' and '$end_sem_barra')));";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

			//echo "<script> alert('Erro - datas invalidas');</script>";

			while($row = $result->fetch_assoc()) {



				if($row['ccUtente'] == $ccUtente && $row['codComprador'] == $codComprador){

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>O médico e o utente já possuem uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

          exit();

				}else if($row['ccUtente'] == $ccUtente){

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>O utente selecionado já tem uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

          exit();

				}else if($row['codComprador'] == $codComprador){

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Você já tem uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

          exit();

				}else{

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Já existe uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

          exit();

	}
}
}

if($findDataHora == false){

$sql = "UPDATE servico SET title='$title', color='$color', start='$start_sem_barra', end='$end_sem_barra', pvpServico = $pvpServico, nSala = $nSala, codComprador = $codComprador, ccUtente = $ccUtente, codTipoServico = $codTipoServico, codLocal = $codLocal WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>A data da intervenção foi alterada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

  exit();

} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();

}

 ?>

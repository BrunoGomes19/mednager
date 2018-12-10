<?php

include('../topos/header.php');

$codComprador = $_SESSION['codComprador'];

$id = $_GET['id'];

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

      $start_sem_barra = $row['start'];

    }
}





$findDataHora = false;

$sql = "SELECT * FROM servico where id!=$id and (ccUtente=$ccUtente or codComprador=$codComprador) and ((((DATE_FORMAT('$start','%Y-%m-%d %H:%i:%s') + INTERVAL 1 second) between servico.start and servico.end) OR ((DATE_FORMAT('$end','%Y-%m-%d %H:%i:%s') + INTERVAL - 1 second) between servico.start and servico.end)) or ((servico.start between (DATE_FORMAT('$start','%Y-%m-%d %H:%i:%s') + INTERVAL 1 second) and (DATE_FORMAT('$end','%Y-%m-%d %H:%i:%s') + INTERVAL - 1 second)) OR (servico.end between (DATE_FORMAT('$start','%Y-%m-%d %H:%i:%s') + INTERVAL 1 second) and (DATE_FORMAT('$end','%Y-%m-%d %H:%i:%s') + INTERVAL - 1 second))));";

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

$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>A hora final da intervenção foi alterada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

  exit();

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}

 ?>

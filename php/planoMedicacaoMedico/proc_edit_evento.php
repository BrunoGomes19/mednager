<?php
session_start();

$codComprador = $_SESSION['codComprador'];

//Incluir conexao com BD
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'idServico', FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$start0 = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end0 = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$codMedicamento = filter_input(INPUT_POST, 'codMedicamento', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
//ir buscar codComprador ao session
//ir buscar utente com ajax??
$dias = filter_input(INPUT_POST, 'dias', FILTER_SANITIZE_NUMBER_INT);
$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
//codAlertas a 0
$ccUtente = filter_input(INPUT_POST, 'ccUtente', FILTER_SANITIZE_NUMBER_INT);

//$originalDate = "2010-03-21";

$dateArray = date_parse_from_format('m/d/Y h:i:s', $start0);
$dateArray2 = date_parse_from_format('m/d/Y h:i:s', $end0);

$start = $dateArray["year"]."-".$dateArray["day"]."-".$dateArray["month"]." ".$dateArray["hour"].":".$dateArray["minute"].":".$dateArray["second"];
$end = $dateArray2["year"]."-".$dateArray2["day"]."-".$dateArray2["month"]." ".$dateArray2["hour"].":".$dateArray2["minute"].":".$dateArray2["second"];

if(($dias == 1 && $horas == 0) || $horas == 0){

if(!empty($title) && !empty($color) && !empty($start) && !empty($end) && !empty($observacoes)){
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;

	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;

	$result_events = "UPDATE planomedicacao SET title='$title', color='$color', start='$start_sem_barra', end='$end_sem_barra', codComprador = $codComprador, ccUtente = $ccUtente, observacoes = '$observacoes', codMedicamento = $codMedicamento  WHERE id='$id'";
	//$msg2 = $result_events;

	$resultado_events = mysqli_query($conn, $result_events);

	//Verificar se alterou no banco de dados através "mysqli_affected_rows"

//	$_SESSION['msg'] = $msg2;
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Intervenção editada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: index.php?cc=$ccUtente");

			exit();

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não fez nenhuma alteração à intervenção!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: index.php?cc=$ccUtente");

			exit();

	}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro3 ao editar a Intervenção<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	//$_SESSION['msg'] =$msg2;
			header("Location: index.php?cc=$ccUtente");

			exit();

		}

	}else{


		if(!empty($title) && !empty($color) && !empty($start) && !empty($end) && !empty($observacoes)){
			//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
			$data = explode(" ", $start);
			list($date, $hora) = $data;
			$data_sem_barra = array_reverse(explode("/", $date));
			$data_sem_barra = implode("-", $data_sem_barra);
			$start_sem_barra = $data_sem_barra . " " . $hora;

			$data = explode(" ", $end);
			list($date, $hora) = $data;
			$data_sem_barra = array_reverse(explode("/", $date));
			$data_sem_barra = implode("-", $data_sem_barra);
			$end_sem_barra = $data_sem_barra . " " . $hora;

			$result_events = "UPDATE planomedicacao SET title='$title', color='$color', start='$start_sem_barra', end='$end_sem_barra', codComprador = $codComprador, ccUtente = $ccUtente, observacoes = '$observacoes', codMedicamento = $codMedicamento  WHERE id='$id'";
			//$msg2 = $result_events;

			$resultado_events = mysqli_query($conn, $result_events);


				$numVezes = 24/$horas;

				$numVezes *= $dias;



				for($i=1;$i<$numVezes;$i++){


									$start_sem_barra = date('Y-m-d H:i:s', strtotime($start_sem_barra. ' + '.$horas.' hour'));
									$end_sem_barra = date('Y-m-d H:i:s', strtotime($end_sem_barra. ' + '.$horas.' hour'));

					$result_events = "INSERT INTO planomedicacao (id,title, color, start, end, observacoes, codComprador, ccUtente,codMedicamento) VALUES (NULL,'$title', '$color', '$start_sem_barra', '$end_sem_barra', '$observacoes', $codComprador, $ccUtente, $codMedicamento)";
				$conn->query($result_events);

				$qualplano = "SELECT id from planomedicacao where codComprador = $codComprador and ccUtente = $ccUtente and codMedicamento = $codMedicamento and start = '$end_sem_barra' and end = '$end_sem_barra'";
				$resplano = $conn->query($qualplano);
				while ($row = $resplano->fetch_assoc()) {
				    $id =  $row['id'];
				    $notif = "INSERT INTO alertautente (codAlertaUtente, descriAlertaUtente, estadoUtente, ccUtente, servico_id, planoMedicacao_id, idAssoc, dataAlertaUtente) VALUES (NULL, NULL, 0, $ccUtente, null, $id, null, now())";
				    $query = mysqli_query($conn,$notif);
				}



				}

					$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Intervenção registada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					//echo "<script> alert('OK');</script>";

				header("Location: index.php?cc=$ccUtente");

				exit();

	}
}

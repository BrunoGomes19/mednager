<?php
session_start();

$codComprador = $_SESSION['codComprador'];

//Incluir conexao com BD
include_once("conexao.php");
$id = filter_input(INPUT_POST, 'idnull', FILTER_SANITIZE_STRING);
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
$ccUtente = filter_input(INPUT_POST, 'ccUtente3', FILTER_SANITIZE_NUMBER_INT);

//$originalDate = "2010-03-21";

$dateArray = date_parse_from_format('m/d/Y h:i:s', $start0);
$dateArray2 = date_parse_from_format('m/d/Y h:i:s', $end0);

$start = $dateArray["year"]."-".$dateArray["day"]."-".$dateArray["month"]." ".$dateArray["hour"].":".$dateArray["minute"].":".$dateArray["second"];
$end = $dateArray2["year"]."-".$dateArray2["day"]."-".$dateArray2["month"]." ".$dateArray2["hour"].":".$dateArray2["minute"].":".$dateArray2["second"];


if($findDataHora == false){



if(!empty($title) && !empty($color) && !empty($start) && !empty($end) && !empty($codMedicamento) && !empty($observacoes) && !empty($dias) && !empty($horas)) {
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

	$result_events = "INSERT INTO planomedicacao (id,title, color, start, end, observacoes, codComprador, ccUtente,codMedicamento) VALUES (NULL,'$title', '$color', '$start_sem_barra', '$end_sem_barra', '$observacoes', $codComprador, $ccUtente,$codMedicamento)";

//	$resultado_events = mysqli_query($conn, $result_events);


	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	//if(mysqli_insert_id($conn)){

	if ($conn->query($result_events) === TRUE) {
		$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Intervenção registada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		//echo "<script> alert('OK');</script>";

	header("Location: index.php?cc=$ccUtente");
	}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro1 ao registar a Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	//echo "<script> alert('Erro - datas invalidas');</script>";

	header("Location: index.php?cc=$ccUtente");
	}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro2 ao registar a Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	//echo "<script> alert('Erro - datas invalidas');</script>";

	header("Location: index.php?cc=$ccUtente");
}


}

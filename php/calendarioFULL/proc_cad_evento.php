<?php
session_start();

//Incluir conexao com BD
include_once("conexao.php");

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$pvpServico = filter_input(INPUT_POST, 'pvpServico', FILTER_SANITIZE_NUMBER_FLOAT);
$nSala = filter_input(INPUT_POST, 'nSala', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
//ir buscar codComprador ao session
//ir buscar utente com ajax??
$ccUtente = filter_input(INPUT_POST, 'ccUtente', FILTER_SANITIZE_NUMBER_INT);
$codTipoServico = filter_input(INPUT_POST, 'codTipoServico', FILTER_SANITIZE_NUMBER_INT);
$codLocal = filter_input(INPUT_POST, 'codLocal', FILTER_SANITIZE_NUMBER_INT);
//codAlertas a 0

if(!empty($title) && !empty($color) && !empty($start) && !empty($end) && !empty($pvpServico) && !empty($nSala) && !empty($codTipoServico) && !empty($codLocal)) {
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
	
	$result_events = "INSERT INTO servico (title, color, start, end, pvpServico, nSala, observacoes, codComprador, ccUtente, codTipoServico, codLocal, codAlertaUtente, codAlertaComprador) VALUES ('$title', '$color', '$start_sem_barra', '$end_sem_barra', $pvpServico, $nSala, '$observacoes', 2, $ccUtente, $codTipoServico, $codLocal, 1, 1 )";

	$resultado_events = mysqli_query($conn, $result_events);
	
	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Intervenção registada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro1 ao registar a Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}
	
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro2 ao registar a Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: index.php");
}
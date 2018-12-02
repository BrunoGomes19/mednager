<?php
session_start();

$codComprador = $_SESSION['codComprador'];

//Incluir conexao com BD
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'idServico', FILTER_SANITIZE_NUMBER_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$start0 = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end0 = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$pvpServico = filter_input(INPUT_POST, 'pvpServico', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$nSala = filter_input(INPUT_POST, 'nSala', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
//ir buscar codComprador ao session
//ir buscar utente com ajax??
$ccUtente = filter_input(INPUT_POST, 'ccUtente', FILTER_SANITIZE_NUMBER_INT);
$codTipoServico = filter_input(INPUT_POST, 'editarTipoServico', FILTER_SANITIZE_NUMBER_INT);
$codLocal = filter_input(INPUT_POST, 'editarLocal', FILTER_SANITIZE_NUMBER_INT);
//codAlertas a 0

//$msg2 = "!empty($id) "."!empty($title) "."!empty($color) "."!empty($start) "."!empty($end) "."!empty($pvpServico) "."!empty($nSala) "."!empty($codTipoServico)  !empty($codLocal))";

$dateArray = date_parse_from_format('m/d/Y h:i:s', $start0);
$dateArray2 = date_parse_from_format('m/d/Y h:i:s', $end0);

$start = $dateArray["year"]."-".$dateArray["day"]."-".$dateArray["month"]." ".$dateArray["hour"].":".$dateArray["minute"].":".$dateArray["second"];
$end = $dateArray2["year"]."-".$dateArray2["day"]."-".$dateArray2["month"]." ".$dateArray2["hour"].":".$dateArray2["minute"].":".$dateArray2["second"];

$findDataHora = false;

$sql = "SELECT * FROM servico where servico.codComprador=$codComprador AND ((servico.start between '$start' and '$end') OR (servico.end between '$start' and '$end')) and servico.id!=$id;";

echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

			//echo "<script> alert('Erro - datas invalidas');</script>";

			$findDataHora = true;
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Já existe uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: index.php");
}

if($findDataHora == false){

if(!empty($id) && !empty($title) && !empty($color) && !empty($start) && !empty($end) && !empty($pvpServico) && !empty($nSala) && !empty($codTipoServico) && !empty($codLocal) && !empty($observacoes)){
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

	$result_events = "UPDATE servico SET title='$title', color='$color', start='$start_sem_barra', end='$end_sem_barra', pvpServico = $pvpServico, nSala = $nSala, codComprador = $codComprador, ccUtente = $ccUtente, codTipoServico = $codTipoServico, codLocal = $codLocal,  observacoes = '$observacoes'  WHERE id='$id'";
	//$msg2 = $result_events;

	$resultado_events = mysqli_query($conn, $result_events);

	//Verificar se alterou no banco de dados através "mysqli_affected_rows"

//	$_SESSION['msg'] = $msg2;
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Intervenção editada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não fez nenhuma alteração à intervenção!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro3 ao editar a Intervenção<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	//$_SESSION['msg'] =$msg2;
	header("Location: index.php");
}
}

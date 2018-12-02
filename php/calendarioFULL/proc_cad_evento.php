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
$pvpServico = filter_input(INPUT_POST, 'pvpServico', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$nSala = filter_input(INPUT_POST, 'nSala', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
//ir buscar codComprador ao session
//ir buscar utente com ajax??
$ccUtente = filter_input(INPUT_POST, 'ccUtente', FILTER_SANITIZE_NUMBER_INT);
$codTipoServico = filter_input(INPUT_POST, 'codTipoServico', FILTER_SANITIZE_NUMBER_INT);
$codLocal = filter_input(INPUT_POST, 'codLocal', FILTER_SANITIZE_NUMBER_INT);
//codAlertas a 0

//$originalDate = "2010-03-21";

$dateArray = date_parse_from_format('m/d/Y h:i:s', $start0);
$dateArray2 = date_parse_from_format('m/d/Y h:i:s', $end0);

$start = $dateArray["year"]."-".$dateArray["day"]."-".$dateArray["month"]." ".$dateArray["hour"].":".$dateArray["minute"].":".$dateArray["second"];
$end = $dateArray2["year"]."-".$dateArray2["day"]."-".$dateArray2["month"]." ".$dateArray2["hour"].":".$dateArray2["minute"].":".$dateArray2["second"];




$findDataHora = false;

$sql = "SELECT * FROM servico where (ccUtente=$ccUtente or codComprador=$codComprador) and ((('$start' between servico.start and servico.end) OR ('$end' between servico.start and servico.end)) or ((servico.start between '$start' and '$end') OR (servico.end between '$start' and '$end')));";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

			//echo "<script> alert('Erro - datas invalidas');</script>";

			while($row = $result->fetch_assoc()) {



				if($row['ccUtente'] == $ccUtente && $row['codComprador'] == $codComprador){

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>O médico e o utente já possuem uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					header("Location: index.php");

				}else if($row['ccUtente'] == $ccUtente){

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>O utente selecionado já tem uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					header("Location: index.php");

				}else if($row['codComprador'] == $codComprador){

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Você já tem uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					header("Location: index.php");

				}else{

					$findDataHora = true;
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Já existe uma intervenção a decorrer nesse dia e hora!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
					header("Location: index.php");




	}
}
}



if($findDataHora == false){



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

	$result_events = "INSERT INTO servico (id,title, color, start, end, pvpServico, nSala, observacoes, codComprador, ccUtente, codTipoServico, codLocal) VALUES (NULL,'$title', '$color', '$start_sem_barra', '$end_sem_barra', $pvpServico, $nSala, '$observacoes', $codComprador, $ccUtente, $codTipoServico, $codLocal )";

//	$resultado_events = mysqli_query($conn, $result_events);


	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	//if(mysqli_insert_id($conn)){

	if ($conn->query($result_events) === TRUE) {
		$_SESSION['msg'] = "<div class='alert alert-primary' role='alert'>Intervenção registada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		//echo "<script> alert('OK');</script>";

		header("Location: index.php");
	}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro1 ao registar a Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	//echo "<script> alert('Erro - datas invalidas');</script>";

		header("Location: index.php");
	}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro2 ao registar a Intervenção <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	//echo "<script> alert('Erro - datas invalidas');</script>";

	header("Location: index.php");
}


}

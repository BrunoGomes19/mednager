<?php

if(isset($_POST["view"])){
	$connect = mysqli_connect("locahost", "root", "Sutas4Ever2018", "mybd");

	$query = "SELECT * FROM alertaUtente ORDER BY codAlerta DESC LIMIT 5";
	$result = mysqli_query($connect, $query);
	$output="";

	if(mysqli_num_rows($result) > 0){

		while($row = mysqli_fetch_array($result)){
			$output .= '
			<li>
				<a href="#">
					<strong>'.$row["descriAlerta"].'</strong><br>
					<small><em>'.$row["titAlerta"].'</em></small>
				</a>
			</li>
			'
		}

	}else{
		$output .='<li>Sem notificações</li>';
	}
	$query_1 = "SELECT * FROM alertaUtente WHERE estadoAlerta=0";
	$result_1 = mysqli_query($connect, $query_1);
	$count = mysqli_num_rows($result_1);
	$data = array(
		'notification' => $output;
		'unseen_notification' => $count
	);
	echo json_encode($data);
}

?>
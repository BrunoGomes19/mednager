<?php
include('../topos/topo_medico.php');

@session_start();

	$sql = "SELECT * from comprador where emailComprador like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		$sexo = $row["sexoComprador"];

		$especialidadeInt = $row["codEspecialidade"];

		$numeroOrdem = $row["nrOrdem"];


		//sexo

		$date = $row["dataNascComprador"];

		$contacto1 = $row["contacto1Comprador"];

		$contacto2 = $row["contacto2Comprador"];

		$cc = $row["ccComprador"];

		$nif = $row["NIFComprador"];

		$nib = $row["NIBComprador"];

		$morada = $row["moradaComprador"];

		$cidade = $row["localidadeComprador"];

		$codigopostal = $row["codPostalComprador"];

		$sobremim = $row["formacaoCarreira"];

    }
} else {
    echo "0 results";
}

$sqlesp = "SELECT * from especialidade";
$resultesp = $conn->query($sqlesp);

$conn->close();

?>


<style>

#erro{

	color:#f42c2c;
	font-size:16px;
	font-family:FontAwesome;

}

</style>

<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">


					<div class="row">
                    <div class="col-md-8">
                        <div class="card">
													<div class="card-footer">
														<form action="../perfis/perfil_medico.php" method="GET" style ='float: left; padding: 5px;'>
																			<button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
																					<i class="fa fa-dot-circle-o"></i> Ver
																			</button>&nbsp
														</form>
														<form action="../registos/registomedico.php" method="GET" style ='float: left; padding: 5px; display: none'>
																			<button type="submit" class="btn btn-danger btn-sm" style="font-size:16px">
																					<i class="fa fa-dot-circle-o"></i> Editar
																			</button>
														 </form>
																	</div>
                            <div class="content">
                                <form name="myForm" onsubmit="return checkInp()" method="POST" action="fimregistomedico.php">
                                    <div class="row">



                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nomecompleto">Nome completo</label>
                                                <input type="text" class="form-control" value="<?php	echo $nome;	?>" name="nomecompleto" id="nomecompleto" required>
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email"><b>Endereço de email</b></label>
                                                <input type="email" class="form-control" value="<?php	echo $email;	?>" name="email" disabled style="border:0;background-color:#f4f4f4;border-radius:5px;">
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numeroOrdem">Número de ordem</label>
                                                <input type="text" class="form-control" value="<?php	echo $n_ordem;	?>" required name="numeroOrdem" id="numeroOrdem">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sexo">Sexo</label>
                                                <select name="sexo" id="select" class="form-control" required>
                                                        <option selected hidden value="<?php	echo $sexo;	?>"><?php	echo $sexo;	?></option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                        <option value="Outro">Outro</option>
                                                    </select>
                                            </div>
                                        </div>

                                    </div>

																		<?php

												            if (isset($_SESSION['msgRegistoNO'])) {
												                echo $_SESSION['msgRegistoNO'];
												                unset($_SESSION['msgRegistoNO']);
												            }

																		?>

                                    <div class="row">

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Especialidade</label>
                                                <select name="especialidade" id="select" class="form-control" required>
																									<?php

																									echo '  <option selected hidden value=""></option>';


																									if ($resultesp->num_rows > 0) {
																										// output data of each row
																										while($row = $resultesp->fetch_assoc()) {

																											$codEspecialidade = $row['codEspecialidade'];

																										  $descriEspecialidade = $row['descriEspecialidade'];

																											if($codEspecialidade == $especialidadeInt){

																												echo '<option value="'.$codEspecialidade.'" hidden selected>'.  $descriEspecialidade .'</option>';


																											}else{

																												if($codEspecialidade==1){


																												}else{

																													echo '<option value="'.$codEspecialidade.'">'.  $descriEspecialidade .'</option>';
}
																											}




																										}
																									}else{

																										echo '<option value="erro">Nenhuma inserida</option>';

																									}

																									 ?>




                                                    </select>
                                            </div>
                                        </div>



													<div class="col-md-5">
                                            <div class="form-group">
											<label>&nbsp &nbsp Data de nascimento</label>



													  <div class="col-sm-10">
													   <div class="input-group">
														<div class="input-group-addon">
														 <i class="fa fa-calendar">
														 </i>
														</div>

														<input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" value="<?php	echo $date;	?>" required autocomplete="off">
													   </div>
													  </div>



                                            </div>
												</div>

                                    </div>

									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contacto1">Contacto 1</label>
                                                <input type="tel" class="form-control" placeholder="" required name="contacto1" id="contacto1" value="<?php	echo $contacto1;	?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contacto2">Contacto 2</label>
                                                <input type="tel" class="form-control" placeholder="" name="contacto2" id="contacto2" value="<?php	echo $contacto2;	?>">
                                            </div>
                                        </div>
                                    </div>

									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cc">Cartão de cidadão</label>
                                                <input type="text" class="form-control" placeholder="" required id="cc" name="cc" value="<?php	echo $cc;	?>">
                                            </div>
                                        </div>

                                    </div>

																		<?php

												            if (isset($_SESSION['msgRegistoCC'])) {
												                echo $_SESSION['msgRegistoCC'];
												                unset($_SESSION['msgRegistoCC']);
												            }

																		?>

									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nif">Número de identificação fiscal (NIF)</label>
                                                <input type="text" class="form-control" placeholder="" required name="nif" id="nif" value="<?php	echo $nif;	?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nib">Número de Identificação Bancária (NIB)</label>
                                                <input type="text" class="form-control" placeholder="" required name="nib" value="<?php	echo $nib;	?>">
                                            </div>
                                        </div>
                                    </div>

																		<?php

												            if (isset($_SESSION['msgRegistoNIF'])) {
												                echo $_SESSION['msgRegistoNIF'];
												                unset($_SESSION['msgRegistoNIF']);
												            }

																		?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Morada</label>
                                                <input type="text" class="form-control" placeholder="" required name="morada" value="<?php	echo $morada;	?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" class="form-control" placeholder="" required name="cidade" value="<?php	echo $cidade;	?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Código postal</label>
                                                <input type="text" class="form-control" placeholder="" required name="codigopostal" value="<?php	echo $codigopostal;	?>" pattern="\d{4}-\d{3}"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Sobre mim</label>
                                                <textarea rows="5" class="form-control" placeholder="" name="sobremim"><?php	echo $sobremim;	?></textarea>
                                            </div>
                                        </div>
                                    </div>





									<div class="col-md-4">

										<label>Fotografia de perfil</label>
										<input type='file' id='upload' onchange="uploadImg(document.getElementById("upload").files)";>
                                        </div>




                                    <input type="submit" class="btn btn-info btn-fill pull-right" onclick='uploadImg(document.getElementById("upload").files)'>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../../Interior/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../Interior/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../Interior/vendor/slick/slick.min.js">
    </script>
    <script src="../../Interior/vendor/wow/wow.min.js"></script>
    <script src="../../Interior/vendor/animsition/animsition.min.js"></script>
    <script src="../../Interior/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../Interior/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../Interior/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../Interior/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../Interior/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Interior/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../Interior/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../Interior/js/main.js"></script>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})

	function checkInp(){
		var cc = document.getElementById("cc");
		var x=document.forms["myForm"]["cc"].value;
	  var regex=/^[a-zA-Z]+$/;
	    if (isNaN(x))
	  {
	    cc.setCustomValidity("Este Cartão de cidadão é inválido!");
	  }else{

		    cc.setCustomValidity("");


	  }


	  var numeroOrdem = document.getElementById("numeroOrdem");
		var y=document.forms["myForm"]["numeroOrdem"].value;
	  var regex=/^[a-zA-Z]+$/;
	    if (isNaN(y))
	  {
	    numeroOrdem.setCustomValidity("Este número de ordem é inválido!");
	  }else{

		    numeroOrdem.setCustomValidity("");


	  }

	  var nif = document.getElementById("nif");
	  var z=document.forms["myForm"]["nif"].value;
	  var regex=/^[a-zA-Z]+$/;
	    if (isNaN(z))
	  {
	    nif.setCustomValidity("Este NIF é inválido!");
	  }else{

	      nif.setCustomValidity("");


	  }

		//nomecompleto

		var nomecompleto = document.getElementById("nomecompleto");
	  var x1=document.forms["myForm"]["nomecompleto"].value;
	  var regex=/^[a-zA-Z]+$/;
	    if (!isNaN(x1))
	  {
	    nomecompleto.setCustomValidity("Este nome é inválido!");
	  }else{

	      nomecompleto.setCustomValidity("");


	  }

		//contacto 1

		var contacto1 = document.getElementById("contacto1");
		var x2=document.forms["myForm"]["contacto1"].value;
		var regex=/^[a-zA-Z]+$/;
			if (isNaN(x2))
		{
			contacto1.setCustomValidity("Este contacto é inválido!");
		}else{

				contacto1.setCustomValidity("");


		}

		//contacto 2

		var contacto2 = document.getElementById("contacto2");
		var x3=document.forms["myForm"]["contacto2"].value;
		var regex=/^[a-zA-Z]+$/;
			if (isNaN(x3))
		{
			contacto2.setCustomValidity("Este contacto é inválido!");
		}else{

				contacto2.setCustomValidity("");


		}


	}

	cc.onchange = checkInp;
	cc.onkeyup = checkInp;

	numeroOrdem.onchange = checkInp;
	numeroOrdem.onkeyup = checkInp;

	nif.onchange = checkInp;
	nif.onkeyup = checkInp;

	nomecompleto.onchange = checkInp;
	nomecompleto.onkeyup = checkInp;

	contacto1.onchange = checkInp;
	contacto1.onkeyup = checkInp;

	contacto2.onchange = checkInp;
	contacto2.onkeyup = checkInp;


</script>

<script>


	function uploadImg(file){

	  var nome = "a";
	  var url = "uploadmedico.php?op=5&nome="+nome;
	  var xhr = new XMLHttpRequest();
	  var fd = new FormData();
	  xhr.open("POST", url, true);
	  xhr.onreadystatechange = function() {
	      if (xhr.readyState == 4 && xhr.status == 200) {
	          var res = JSON.parse(xhr.responseText);
	          if(parseInt(res['val']) == 1){
	              alert(res['msg']);
	              loadList()
	          }else{
	              alert(res['msg']);
	          }
	      }
	  };
	  fd.append('file0', file[0]);
	  //fd.append('file', file);
	  xhr.send(fd);
	}
	function loadList(){
		if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp2 = new XMLHttpRequest();
	    } else {
	        // code for IE6, IE5
	        xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp2.onreadystatechange = function() {
	        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
	        	var info = JSON.parse(xmlhttp2.responseText)
	            document.getElementById('tab').innerHTML = info['msg'];
	        }
	    };
	    xmlhttp2.open("GET","upload.php?op=1",true);
	    xmlhttp2.send();
	}
	function remUser(id){
		if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp3 = new XMLHttpRequest();
	    } else {
	        // code for IE6, IE5
	        xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp3.onreadystatechange = function() {
	        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
	        	var info = JSON.parse(xmlhttp3.responseText)
	            if(parseInt(info['val']) == 1){
	              	alert(info['msg']);
	              	loadList()
	          	}else{
	              	alert(info['msg']);
	          	}
	        }
	    };
	    xmlhttp3.open("GET","upload.php?op=3&id="+id,true);
	    xmlhttp3.send();
	}
	document.addEventListener("DOMContentLoaded", function(event) {
		loadList();
	});
</script>



</body>

</html>
<!-- end document-->

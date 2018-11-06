<?php
include('../php/topo_medico.php');
			
	$sql = "SELECT * from comprador where emailComprador like '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		$sexo = $row["sexoComprador"];
		
		$especialidadeInt = $row["codEspecialidade"];
		
		$especialidade = $row["codEspecialidade"];
		
		if($especialidade==1){
			
			$especialidade="";
			
		}else{
			
			if($especialidade==2){
			
			$especialidade="Pediatria";
			
		}else{
			
			if($especialidade==3){
			
			$especialidade="Cardiologia";
			
		}else{
			
			$especialidade="";
			
		}
			
		}
			
		}
		
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
$conn->close();

?>


<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

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
                            <div class="header">
                                <h4 class="title">Editar perfil</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="../php/fimregistomedico.php">
                                    <div class="row">
                                        
										
										
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nomecompleto">Nome completo</label>
                                                <input type="text" class="form-control" value="<?php	echo $login_session;	?>" name="nomecompleto" required>
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Endereço de email</label>
                                                <input type="email" class="form-control" value="<?php	echo $email;	?>" name="email" disabled>
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numeroOrdem">Número de ordem</label>
                                                <input type="text" class="form-control" value="<?php	echo $n_ordem;	?>" required name="numeroOrdem">
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

                                    <div class="row">
									
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Especialidade</label>
                                                <select name="especialidade" id="select" class="form-control" required>
                                                        <option selected hidden value="<?php	echo $especialidadeInt;	?>"><?php	echo $especialidade;	?></option>
                                                        <option value="2">Pediatria</option>
                                                        <option value="3">Cardiologia</option>
                                                     
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
														
														<input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" value="<?php	echo $date;	?>" required>
													   </div>
													  </div>
													
													 
												
                                            </div>
												</div>
                                         
                                    </div>
									
									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contacto1">Contacto 1</label>
                                                <input type="tel" class="form-control" placeholder="" required name="contacto1" value="<?php	echo $contacto1;	?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contacto2">Contacto 2</label>
                                                <input type="tel" class="form-control" placeholder="" name="contacto2" value="<?php	echo $contacto2;	?>">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cc">Cartão de cidadão</label>
                                                <input type="text" class="form-control" placeholder="" required name="cc" value="<?php	echo $cc;	?>">
                                            </div>
                                        </div>
                                        
                                    </div>
									
									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nif">Número de identificação fiscal (NIF)</label>
                                                <input type="text" class="form-control" placeholder="" required name="nif" value="<?php	echo $nif;	?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nib">Número de Identificação Bancária (NIB)</label>
                                                <input type="text" class="form-control" placeholder="" required name="nib" value="<?php	echo $nib;	?>">
                                            </div>
                                        </div>
                                    </div>

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
                                                <input type="text" class="form-control" placeholder="" required name="codigopostal" value="<?php	echo $codigopostal;	?>">
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
									
									
									
									
									<label for="">Fotografia de perfil</label>
									<div class="col-md-4">
									
                                            <div class="form-group">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto">
                                            <label class="custom-file-label " for="validatedCustomFile">Escolher imagem...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>
									

                              

                                    <input type="submit" class="btn btn-info btn-fill pull-right">
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
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
	
	
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
</script>

</body>

</html>
<!-- end document-->

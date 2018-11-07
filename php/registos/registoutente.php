<?php
include('../topos/topo_utente.php');


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
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">

                                        </div>



										<div class="col-md-5">
                                            <div class="form-group">
											<label>&nbsp &nbsp Data de nascimento</label>
                                                <form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">


													  <div class="col-sm-10">
													   <div class="input-group">
														<div class="input-group-addon">
														 <i class="fa fa-calendar">
														 </i>
														</div>

														<input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
													   </div>
													  </div>


								</form>
                                            </div>
													</div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome completo</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>

										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Endereço de email</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cartão de cidadão</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sexo</label>
                                                <select name="especialidade" id="select" class="form-control" required>
                                                        <option selected hidden value="">BD</option>
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
                                                <label for="exampleInputEmail1">Contacto 1</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contacto 2</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>



									<div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Número de identificação fiscal (NIF)</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Número de Identificação Bancária (NIB)</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Morada</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Código postal</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Sobre mim</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div>




									<label for="">Fotografia de perfil</label>
									<div class="col-md-4">

                                            <div class="form-group">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile">
                                            <label class="custom-file-label " for="validatedCustomFile">Escolher imagem...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>




                                    <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
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
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

</body>

</html>
<!-- end document-->

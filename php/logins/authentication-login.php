<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="../../landingPage/img/logos/redondo.png" rel="icon">
    <title>mednager</title>
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>

#erro{

	color:#f42c2c;
	font-size:16px;
	font-family:FontAwesome;

}


</style>

</head>

<!--<body onload="f1()">-->



									<?php

									if(isset($_GET['recup'])){

										echo '<body onload="f1()">';

									}
									else{

										echo '<body>';

									}


									?>







    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-light">
            <div class="auth-box bg-light border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <a href="../indexes/index.php"><span class="db"><img style="width: 100%;padding-top:5%;" src="../../assets/images/logos/dindindin.png" alt="logo" /></span></a>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="login.php" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>

									<?php

									if(isset($_GET['user'])){

										$user = $_GET['user'];

										echo '<input type="text" class="form-control form-control-lg" placeholder="Identificação" aria-label="Username" aria-describedby="basic-addon1" required="" name="username" value="'.$user.'">';

									}
									else{

										echo '<input type="text" class="form-control form-control-lg" placeholder="Identificação" aria-label="Username" aria-describedby="basic-addon1" required="" name="username">';

									}


									?>

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Palavra-passe" aria-label="Password" aria-describedby="basic-addon1" required="" name="password">
                                </div>
                            </div>
                        </div>


						<?php


					$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

					if(strpos($fullUrl, "signup=uerror") == true){

						echo '<p id="erro">Palavra-passe errada. Tente novamente ou clique em Esqueci-me da palavra-passe para a repor.<br><br></p>';



					}else{

						if(strpos($fullUrl, "signup=cerror") == true){

						echo '<p id="erro">Palavra-passe errada. Tente novamente ou clique em Esqueci-me da palavra-passe para a repor.<br><br></p>';



					}else{

					if(strpos($fullUrl, "signup=oerror") == true){


						echo '<p id="erro">Não foi possível encontrar a sua conta!<br><br></p>';

					}else{

						if(strpos($fullUrl, "signup=recup") == true){

							echo'<div class="alert alert-warning alert-dismissible fade-show" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <span style="color:white;">Dentro de alguns minutos receberá um e-mail para recuperar a sua palavra-passe.</span>
								</div>';

						}else{
							if(strpos($fullUrl, "signup=logout") == true){

								echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <span style="color:white;">Você saiu da sua conta. Esperemos que volte brevemente!</span>
								</div>';

							}else{

								if(strpos($fullUrl, "signup=newpass") == true){

								echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <span style="color:white;">Password alterada com sucesso!</span>
								</div>';

							}else{

								if(strpos($fullUrl, "signup=ee") == true){

								echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <span style="color:white;">E-mail enviado com sucesso!</span>
								</div>';

							}else{

                if(strpos($fullUrl, "signup=emailregisto") == true){

                  echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
  							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  							   <span style="color:white;">Obrigado por efetuar o seu registo.<br>Por favor verifique o seu email para confirmar a sua conta!</span>
  								</div>';

                }else{

                  if(strpos($fullUrl, "signup=emailconfirmado") == true){

                    echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <span style="color:white;">Email confirmado com sucesso!</span>
                    </div>';


                  }



                }

              }

							}

							}
						}

					}

					}

					}

				?>


                        <div class="row border-top border-secondary">

                            <div class="col-12">
                                <div class="form-group">

                                    <div class="p-t-20">
                                        <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Esqueceu-se da senha?</button>
                                        <input class="btn btn-info float-right" type="submit" name="submit" value="Entrar"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>





                <div id="recoverform">
                    <div class="text-center" style="padding-bottom:3%;">
                        <span class="text-black">Insira o seu e-mail para recuperar a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <br>
                        <form class="col-12" action="../reset_pass/recuperar.php" method="POST">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                 <input type="email" class="form-control form-control-lg" placeholder="E-mail" aria-label="email" aria-describedby="basic-addon1" required name="emailr">
                            </div>

							<?php

							if(strpos($fullUrl, "signup=emailnotin") == true){

							//onload (id="to-recover")


							echo '<p id="erro">Não existe nenhuma conta com este e-mail!<br><br></p>';

						}


							?>

                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary" style="padding-top:5%">
                                <div class="col-12">
                                    <a class="btn btn-info" href="#" id="to-login" name="action">Regressar ao Login</a>
                                    <input class="btn btn-info float-right" type="submit" name="submit" value="Recuperar"></input>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });

	function f1(){

		$("#loginform").hide();
        $("#recoverform").show();

	}

	 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 6000);

    </script>

</body>

</html>

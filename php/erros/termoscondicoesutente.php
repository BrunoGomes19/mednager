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

<script>

function aceito(){

  document.getElementById("termos").style.display = "block";


}



</script>

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
                        <a href="../indexes/index.php"><span class="db"><img style="width: 100%" src="../../assets/images/logos/dindindin.png" alt="logo" /></span></a>
                    </div>
                    <br>
                    <!-- Form -->

                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">

                                    </div>

                  <textarea rows="17" cols="55" id="a" readonly style="padding:2%;border-radius:3px" onscroll="aceito();">
                    TERMOS E CONDIÇÕES
Política de privacidade e Termos e Condições

A Texto Editores respeita a privacidade individual e valoriza a confiança dos seus utilizadores, clientes e parceiros. Como tal, estamos empenhados em proteger a informação pessoal que venha a partilhar connosco. Esta página descreve como fazemos uso dessa informação.

Recepção de dados
Ao ceder-nos a sua informação pessoal, voluntariamente, ela apenas será acedida pelos nossos serviços. É considerado informação pessoal tudo o que possa ser usado para identificar um utilizador como, por exemplo, nome, endereço electrónico, título, data de nascimento, género, profissão, interesses pessoais ou demais dados necessários para que possamos prestar o serviço solicitado ou até melhorar o funcionamento do Site. Não registamos automaticamente informação pessoal, incluindo o seu endereço de IP. O registo dos endereços de IP que consultam o Site servem apenas para efeito de análise estatística de tráfego. Os dados fornecidos não serão transferidos para terceiros sem o seu consentimento prévio, mas podem ser usados dentro da editora ou por outra empresa actuando como agente da editora para fins de processamento ou correio.

Actualização da informação
Se, a qualquer momento, desejar interromper a recepção de e-mails ou outras comunicações connosco, ou se tiver enviado informação pessoal identificável através do nosso Site e gostaria que essa informação fosse apagada dos registos, é favor notificar-nos para webmaster@leya.com. A correcção ou mudança dos seus dados também é possível.

Ligações a Sites de terceiros
Por cortesia aos nossos visitantes, o nosso Site contém ligações para alguns Sites de terceiros, os quais, a nosso ver, podem conter informações úteis. A Política de Privacidade aqui apresentada não se aplica a estes Sites, por isso, aconselhamos vivamente a consulta da Política de Privacidade dos mesmos.

Outros
O material disposto neste Site, em texto e imagem, é propriedade da editora ou de terceiros; a sua utilização é feita com a devida autorização dos seus autores. A utilização não autorizada constitui um crime punível por lei. Se tiver dúvidas ou alguma questão sobre a forma como gerimos a informação, por favor envie-nos um e-mail para webmaster@leya.com. Este endereço também é reservado à comunicação de factos que possam, de uma maneira ou outra, infringir alguma das normas explícitas nesta política, bem como comprometer a segurança do Site e o seu normal funcionamento.

Actualizações
Quaisquer mudanças realizadas na Política de Privacidade deste Site serão descriminadas nesta página e podem ser efectuadas a qualquer momento. Se a alteração for substancial e tiver implicações na forma como usamos os seus dados, será informado através de uma aviso na página de entrada do Site.

Data de publicação deste aviso legal: Outubro 2011.
                  </textarea>



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

							echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
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

                                    <div class="p-t-20" id="termos" style="display:none;">
                                        <a href="../registos/auth-reg-utente.php">
                                        <input class="btn btn-info float-right" type="submit" name="submit" value="Aceito" id="aceito">
                                        </a>
                                        <a href="../indexes/index.php">
                                        <input class="btn .btn-danger float-right" type="submit" value="Não aceito" style="margin-right:5%">

                                      </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


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

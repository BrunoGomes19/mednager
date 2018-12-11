<?php

@session_start();

?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="../../landingPage/img/logos/redondo.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <title>mednager</title>
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
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

<body>
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
            <div class="auth-box bg-light border-secondary">
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <a href="../indexes/index.php"><span class="db"><img style="width: 100%" src="../../landingPage/img/logos/logotipo.png" alt="logo" /></span></a>
                    </div>
                    <!-- Form -->
                    <form name="myForm" class="form-horizontal m-t-20" onsubmit="return checkInp()" action="registar.php" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Nome completo" aria-label="nomeComprador" aria-describedby="basic-addon1" required name="nome" id="nomecompleto">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Cédula" aria-label="nrOrdem" aria-describedby="basic-addon1" required name="nrOrdem" id="nrOrdem">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon1"><i class="ti-quote-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Cartão de cidadão" aria-label="cc" aria-describedby="basic-addon1" required name="cc" id="cc">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-quote-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="NIF" aria-label="nif" aria-describedby="basic-addon1" required name="nif" id="nif">
                                </div>







								<div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>

									 <select name="sexo" id="select" class="form-control form-control-lg" required>
                                                        <option selected hidden value="">Sexo</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                        <option value="Outro">Outro</option>
                                                    </select>

                                </div>






                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg" placeholder="E-mail" aria-label="email" aria-describedby="basic-addon1" required name="email">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Palavra-passe" aria-label="Password" aria-describedby="basic-addon1" required name="password" id="password">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Confirmar palavra-passe" aria-label="Password" aria-describedby="basic-addon1" required name="confirmPassword" id="confirm_password">
                                </div>
                            </div>
                        </div>

						<?php

            if (isset($_SESSION['msgRegisto'])) {
                echo $_SESSION['msgRegisto'];
                unset($_SESSION['msgRegisto']);
            }

				    ?>

                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <input class="btn btn-block btn-info" type="submit" name="submit" value="Registar"></input>
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

		var password = document.getElementById("password");
        confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("As palavra-passes não coincidem!");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


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


  var nrOrdem = document.getElementById("nrOrdem");
	var y=document.forms["myForm"]["nrOrdem"].value;
  var regex=/^[a-zA-Z]+$/;
    if (isNaN(y))
  {
    nrOrdem.setCustomValidity("Esta cédula é inválida!");
  }else{

	    nrOrdem.setCustomValidity("");


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

}

cc.onchange = checkInp;
cc.onkeyup = checkInp;
nrOrdem.onchange = checkInp;
nrOrdem.onkeyup = checkInp;
nif.onchange = checkInp;
nif.onkeyup = checkInp;
nomecompleto.onchange = checkInp;
nomecompleto.onkeyup = checkInp;

    </script>

</body>

</html>

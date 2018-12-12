<?php
include('header.php');

$email=$_SESSION['email'];

$sqlrecuperacaoc = "SELECT * from comprador where emailcomprador = '$email'";
$result = $conn->query($sqlrecuperacaoc);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

  	$notas = $row['notas'];

  }
}

if($_SESSION['permissao'] != 1){

  header("Location: ../logins/logout.php");

  exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->

	<link href="../../landingPage/img/logos/redondo.png" rel="icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>mednager</title>

    <!-- Fontfaces CSS-->
    <link href="../../Interior/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../Interior/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../Interior/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../Interior/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../Interior/css/theme.css" rel="stylesheet" media="all">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>




    <script>

    function guardarNotas() {

    var a = document.getElementById("a").value

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                }
            };
            xmlhttp.open("GET","../topos/ajaxnotas-medico.php?q="+a+"&op=1",true);
            xmlhttp.send();

    }


    </script>

    <style>

    #a {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        resize: none;
        width: 100%;
        height: 100%;

    }

    </style>

</head>

<body class="animsition">

  <!-- Modal -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

          <div class="modal-body" style="height:635px" id="divnotas">
          <textarea name="Text1" id="a" placeholder="Notas:" onkeyup="guardarNotas();" maxlength="1000"><?php echo $notas;  ?></textarea>
        </div>


      </div>
    </div>
  </div>

    <div class="page-wrapper">

	        <!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="../indexes/index-admin.php">
                            <img src="../../assets/images/logos/logotipo_final.png" alt="mednager" width="179px" height="52px" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="../indexes/index-admin.php">
                                <i class="fas fa-home"></i>Início</a>
                        </li>
                        <li>
                            <a href="../listas/admin-lu.php">
                                <i class="fas fa-users"></i>Lista de Utente</a>
                        </li>
                        <li>
                            <a href="../listas/admin-lm.php">
                                <i class="fas fa-user-md"></i>Lista de Médicos</a>
                        </li>
                        <li class="has-sub">
                            <!--MUDAR PARA GERIR CAMPOS DE ESPECIALIDADES-->
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Intervenções</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../listas/historicoconsultas-admin.php">Histórico</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="../estatisticas/adminEstatisticas.php">
                                <i class="fas fa-signal"></i>Estatísticas</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-calendar-alt"></i>Planos de Medicação</a>
                        </li>
                        <li>
                            <a href="../listas/listamedicamentos2.php">
                                <i class="far fa-medkit"></i>Medicamentos</a>
                        </li>
                        <br>
                        <li>
                            <a href="../registos/medico-admin_registoutente.php">
                                <i class="fas fa-plus"></i>Registo de Utentes</a>
                        </li>
                        <li>
                            <a href="../registos/admin_registomedico.php">
                                <i class="fas fa-plus"></i>Registo de Médicos</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-calendar-alt"></i>Planos de Medicação</a>
                        </li>
                        <br>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-settings"></i>Configurações</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../configuracoes/config-espec.php">Campos</a>
                                </li>
                                <li>
                                    <a href="../configuracoes/configura-especialidades-medicamentos.php">Especialidades</a>
                                </li>
                                <li>
                                    <a href="../configuracoes/config-categ.php">Categorias</a>
                                </li>
                                <li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="../indexes/index-admin.php">
                    <img style="width: 100%" src="../../landingPage/img/logos/logotipo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="../indexes/index-admin.php">
                                <i class="fa fa-home"></i>Início</a>

                        </li>




                        <li>
                            <a href="../listas/admin-lu.php">
                                <i class="fa fa-users"></i>Lista de Utentes</a>
                        </li>

                        <li>
                            <a href="../listas/admin-lm.php">
                                <i class="fa fa-user-md"></i>Lista de Médicos</a>
                        </li>

                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fa fa-tasks"></i>Intervenções</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                                <li>
                                    <a href="../listas/historicoconsultas-admin.php">Histórico</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="../estatisticas/adminEstatisticas.php">
                                <i class="fa fa-signal"></i>Estatísticas</a>
                        </li>

                        <li>
                            <a href="../listas/listamedicamentos2.php">
                                <i class="fa fa-medkit"></i>Medicamentos</a>
                        </li>
                        <br>
                        <li>
                            <a href="../registos/medico-admin_registoutente.php">
                                <i class="fas fa-plus"></i>Registo de Utentes</a>
                        </li>
                        <li>
                            <a href="../registos/admin_registomedico.php">
                                <i class="fas fa-plus"></i>Registo de Médicos</a>
                        </li>

                        <br>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-settings"></i>Configurações</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../configuracoes/config-espec.php">Campos por especialidade</a>
                                </li>
                                <li>
                                    <a href="../configuracoes/configura-especialidades-medicamentos.php">Medicamentos por especialidade</a>
                                </li>
                                <li>
                                    <a href="../configuracoes/config-categ.php">Medicamentos por categorias</a>
                                </li>
                                <li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">

                              <div class="noti-wrap">


                                <button type="button" data-toggle="modal" data-target="#myModal2">
                                    <i class="fas fa-sticky-note" style="font-size:25px;color:#a9b3c9;"></i>
                                </button>
                                  <div class="noti__item js-item-menu">






                                  </div>
                              </div>


                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../../assets/images/users/1.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Administrador</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../assets/images/users/1.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Administrador</a>
                                                    </h5>
                                                    <span class="email"><?php $email=$_SESSION['email']; echo $email;?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">

                                                <div class="account-dropdown__item">
                                                    <a href="../alterar/changesAdmin.php">
                                                        <i class="zmdi zmdi-settings"></i>Definições</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logins/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Sair</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

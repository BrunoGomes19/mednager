<?php
include('header.php');

$email = $_SESSION['email'];

$sqlrecuperacaoc = "SELECT * from utente where emailUtente = '$email'";
$result = $conn->query($sqlrecuperacaoc);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    $sexo = $row['sexoUtente'];

    $nome = $row['nomeUtente'];

	$email = $row['emailUtente'];

    $linkimagem = $row['linkimagem'];

    $notas = $row['notas'];


  }
}

if($_SESSION['permissao'] != 3){

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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!-- Main CSS-->
    <link href="../../Interior/css/theme.css" rel="stylesheet" media="all">


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
              xmlhttp.open("GET","../topos/ajaxnotas-medico.php?q="+a+"&op=2",true);
            xmlhttp.send();

    }



    function notifIntervencoes(x, servico, plano, idAssoc){

      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if(x==1){
                window.location.href="../calendarioFULL/indexUtente.php";
              } else if(x==2){
                window.location.href="../planoMedicacaoMedico/indexUtente.php";
              }else if(x==3){
                window.location.href="../listas/utente-listaPedidos.php";
              }

            }
        };
        xmlhttp.open("GET","../topos/notifClick.php?op="+x+"&servico="+servico+"&plano="+plano+"&idAssoc="+idAssoc,true);
        xmlhttp.send();

    }




    </script>

    <!DOCTYPE html>
    <html lang="en">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

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
          <textarea name="Text1" id="a" onkeyup="guardarNotas();" maxlength="1000"><?php echo $notas;  ?></textarea>

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
                        <a class="logo" href="../indexes/index-utente.php">
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
                        <li class="active has-sub">
                            <a href="../indexes/index-utente.php">
                                <i class="fa fa-home"></i>Início</a>

                        </li>
                        <li>
                            <a href="../listas/utente-lm.php">
                                <i class="fa fa-user-md"></i>Lista de Médicos</a>
                        </li>

                        <li>
                            <a href="../listas/utente-listaPedidos.php">
                                <i class="fas fa-user-friends"></i>Lista de Associações</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Intervenções</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../calendarioFULL/indexUtente.php">Gestão</a>
                                </li>
                                <li>
                                    <a href="../listas/historicoconsultas-utente.php">Histórico</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="../planoMedicacaoMedico/indexUtente.php">
                                <i class="fa fa-calendar-alt"></i>Plano de Medicação</a>
                        </li>

                        <li>
                            <a href="../estatisticas/estatisticasUtente.php">
                                <i class="fa fa-signal"></i>Estatísticas</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="../indexes/index-utente.php">
                    <img style="width: 100%" src="../../landingPage/img/logos/logotipo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="../indexes/index-utente.php">
                                <i class="fa fa-home"></i>Início</a>

                        </li>
                        <li>
                            <a href="../listas/utente-lm.php">
                                <i class="fa fa-user-md"></i>Lista de Médicos</a>
                        </li>

                        <li>
                            <a href="../listas/utente-listaPedidos.php">
                                <i class="fas fa-user-friends"></i>Lista de Associações</a>
                        </li>

                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fa fa-tasks"></i>Intervenções</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="../calendarioFULL/indexUtente.php">Gestão</a>
                                </li>
                                <li>
                                    <a href="../listas/historicoconsultas-utente.php">Histórico</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="../planoMedicacaoMedico/indexUtente.php">
                                <i class="fa fa-calendar-alt"></i>Plano de Medicação</a>
                        </li>

                        <li>
                            <a href="../estatisticas/estatisticasUtente.php">
                                <i class="fa fa-signal"></i>Estatísticas</a>
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


                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <?php
                                        $email = $_SESSION['email'];

                                        //$tituloIntervencao = "SELECT servico.title from servico, associados, utente where servico.ccUtente = utente.ccUtente and associados.utente_ccUtente = utente.ccUtente and emailUtente ='".$email."' ";

                                        $sqlnotifs = "SELECT codAlertaUtente, descriAlertaUtente, estadoUtente, alertaUtente.ccUtente, servico_id, planoMedicacao_id, idAssoc, dataAlertaUtente FROM alertautente, utente WHERE utente.ccUtente = alertaUtente.ccUtente and emailUtente ='".$email."' AND estadoUtente=0";
                                        $result2 = $conn->query($sqlnotifs);

                                        if ($result2->num_rows > 0) {
                                            echo "<span class='quantity'>";

                                            $bola = "SELECT COUNT(*) as quantidadeNotif FROM alertautente, utente WHERE utente.ccUtente=alertautente.ccUtente AND emailUtente ='".$email."' AND estadoUtente=0";
                                            $bolinha = $conn->query($bola);
                                            while($row = $bolinha->fetch_assoc()){

                                              $quantidadeNotif = $row['quantidadeNotif'];

                                              echo "$quantidadeNotif</span>";
                                            }
                                                  echo" <div class='notifi-dropdown js-dropdown'>";
                                            while($row = $result2->fetch_assoc()) {

                                                $descri = $row['descriAlertaUtente'];
                                                $data = $row['dataAlertaUtente'];
                                                $servico  = $row["servico_id"];
                                                $plano = $row['planoMedicacao_id'];
                                                $idAssoc  = $row["idAssoc"];
                                                //if c/ o tipo de notif para decidir a descri e o icon

                                                if($servico != null && $plano == null && $idAssoc == null){

                                                  echo "<div class='notifi__item' onclick='notifIntervencoes(1, $servico, 0, 0);'>
                                                  <div class='bg-c1 img-cir img-40' onclick>
                                                      <i class='zmdi zmdi-account-box'></i>
                                                  </div>
                                                  <div>
                                                      <p>Intervenção</p>
                                                      <p class='date'>$data</p>
                                                  </div>
                                                  </div>";
                                                } else if ($servico == null && $plano != null && $idAssoc == null){
                                                  echo "<div class='notifi__item' onclick='notifIntervencoes(2, 0, $plano, 0);'>
                                                  <div class='bg-c2 img-cir img-40'>
                                                      <i class='zmdi zmdi-account-box'></i>
                                                  </div>
                                                  <div>
                                                      <p>Plano de medicação</p>
                                                      <p class='date'>$data</p>
                                                  </div>
                                                  </div>";
                                                } else if($servico == null && $plano == null && $idAssoc != null){
                                                  echo "<div class='notifi__item' onclick='notifIntervencoes(3, 0, 0, $idAssoc);'>
                                                  <div class='bg-c3 img-cir img-40'>
                                                      <i class='zmdi zmdi-account-box'></i>
                                                  </div>
                                                  <div>
                                                      <p>Associação</p>
                                                      <p class='date'>$data</p>
                                                  </div>
                                                  </div>";
                                                }
                                            }
                                        }
                                        ?>
                                        <!--
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                             </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">


                                        <?php

                                          if($linkimagem == null){

                                            echo '<img src="../../assets/images/users/1.jpg" alt="John Doe" />';

                                          }else{

                                            echo '<img src="'.$linkimagem.'" alt="John Doe" />';

                                          }
                                          ?>


                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $nome;?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">


                                                      <?php

                                                        if($linkimagem == null){

                                                          echo '<img src="../../assets/images/users/1.jpg" alt="John Doe" />';

                                                        }else{

                                                          echo '<img src="'.$linkimagem.'" alt="John Doe" />';

                                                        }
                                                        ?>


                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $nome;?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $email;?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="../perfis/perfil_utente.php">
                                                        <i class="zmdi zmdi-account"></i>Perfil</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Configurações</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Pagamentos</a>
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

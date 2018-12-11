<?php

  @session_start();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <style>

  #erro{

  	color:#f42c2c;
  	font-size:16px;
  	font-family:FontAwesome;

  }


  </style>

  <meta charset="utf-8">
  <title>mednager</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../landingPage/img/logos/redondo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../../landingPage/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../landingPage/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../landingPage/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../landingPage/lib/venobox/venobox.css" rel="stylesheet">
  <link href="../../landingPage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../landingPage/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->

  <script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Início</a></li>

          <li><a href="#speakers">Quem somos?</a></li>



          <li><a href="#sponsors">Serviços</a></li>
          <li><a href="#contact">Contacte-nos</a></li>

          <li><a href="../logins/authentication-login.php">Login</a></li>
          <li class="buy-tickets"><a href="#buy-tickets">Adquirir</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->



  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
    	<a href="#"><img src="../../landingPage/img/logos/logotipo.png" class="img-responsive" style="width: 600px; margin-top: -16px;"></a>

      <p class="mb-4 pb-0" style="background-color: rgba(6, 12, 34, 0.1); border-radius: 15px">&nbsp&nbspO melhor amigo do médico&nbsp&nbsp</p>


    </div>
  </section>

  <main id="main">



    <!--==========================
      Speakers Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>A nossa equipa</h2>
        </div>

        <div class="row">


          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="../../landingPage/img/equipa/bruno.png" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3 style="color: #5fbace"> Bruno Gomes</h3>
                <p>Programador</p>
                <div class="social">
                  <a href="https://www.linkedin.com/in/bmbgomes/"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="../../landingPage/img/equipa/carol.png" alt="Speaker 4" class="img-fluid">
              <div class="details">
                <h3 style="color: #5fbace">Carolina Roque</h3>
                <p>Programadora</p>
                <div class="social">
                  <a href="https://www.linkedin.com/in/carolinaroqu3/"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="../../landingPage/img/equipa/maria.png" alt="Speaker 5" class="img-fluid">
              <div class="details">
                <h3 style="color: #5fbace">Maria Correia</h3>
                <p>Programadora</p>
                <div class="social">
                  <a href="https://www.linkedin.com/in/maria99/"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="../../landingPage/img/equipa/pat.png" alt="Speaker 6" class="img-fluid">
              <div class="details">
                <h3 style="color: #5fbace">Patrícia Correia</h3>
                <p>Programadora</p>
                <div class="social">
                  <a href="https://www.linkedin.com/in/pa7amc/"><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>









    <!--==========================
      Sponsors Section
    ============================-->
    <section id="sponsors" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Serviços</h2>
        </div>

        <div class="row no-gutters sponsors-wrap clearfix">


          <div class="col-lg-3 col-md-4 col-xs-6">
            <div>
              <img src="../../landingPage/img/servicos/analise.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div>
              <img src="../../landingPage/img/servicos/autogestao.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div>
              <img src="../../landingPage/img/servicos/inforeal.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div>
              <img src="../../landingPage/img/servicos/previsao.png" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
  
          <div class="container">
              <img width=1110 src="../../assets/images/mednager-screens.png" alt="MockUp">
          </div>
    </section>
    


    <!--==========================
      Buy Ticket Section
    ============================-->
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Preços</h2>
        </div>

        <div class="row">
          <!-- Admin Tier-->
          <div class="col-lg-4a">
            <div class="card mb-5 m-lg-3">
              <div class="card-body">
                <h6 class="card-title text-muted text-uppercase text-center">Desde</h6>
                <h6 class="card-price text-center">999€</h6>
                <h5 class="card-title text-muted text-uppercase text-center">Coletivo anual</h5>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li "><i class="fa fa-check"></i></span>Acesso Total</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Registo de Utilizadores</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Gestão de Intervenções</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Estatísticas</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Planos de Medicação</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Lista de Medicamentos</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Registo de campos dinâmicos</li>
                </ul>
                <hr>
                <div class="text-center">
                  <a href="#contact"" style="color:white"><button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Adquirir</button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Médico Tier -->
          <div class="col-lg-4a">
            <div class="card mb-5 m-lg-3">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Mensal</h5>
                <h6 class="card-price text-center">29.99€</h6>
                <h5 class="card-title text-muted text-uppercase text-center">Médico</h5>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li "><i class="fa fa-check"></i></span>Agenda Pessoal</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Associação de Utentes</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Registo de Utentes</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Gestão de Intervenções</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Estatísticas</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Planos de Medicação</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Lista de Medicamentos</li>

                </ul>
                <hr>
                <div class="text-center">
                  <a href="../erros/termoscondicoesmedico.php" style="color:white"><button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Adquirir</button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Utente Tier -->
          <div class="col-lg-4a">
            <div class="card mb-5 m-lg-3">
              <div class="card-body">
              	<h6 class="card-price text-center">Grátis</h6>
                <h5 class="card-title text-muted text-uppercase text-center">Utente</h5>

                <hr>
                <ul class="fa-ul">

                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Gestão de Intervenções</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Interação com médico</li>

                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Planos de Medicação</li>

                </ul>
                <hr>
                <div class="text-center">
                  <a href="../erros/termoscondicoesutente.php" style="color:white"><button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Registar</button></a>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>



    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">


        <div class="section-header">
          <h2>Contacte-nos</h2>
          <p>Se tiver alguma questão, não hesite em contactar-nos!</p>
        </div>

        <?php
        if (isset($_SESSION['msgEmailEnviado'])) {
            echo $_SESSION['msgEmailEnviado'];
            unset($_SESSION['msgEmailEnviado']);
        }
        ?>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Local</h3>
              <address>Évora, Portugal</address>
            </div>
          </div>



          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">mednager@outlook.pt</a></p>
            </div>
          </div>

        </div>

        <div class="form">


          <div id="sendmessage">A mensagem foi enviada. Obrigada!</div>
          <div id="errormessage"></div>
          <form method="post" role="form" class="contactForm" action="../reset_pass/enviarmensagem.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="O seu nome" data-rule="minlen:4" data-msg="Por favor introduza no mínimo 4 caracteres" required />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="O seu email" data-rule="email" data-msg="Por favor introduza um email válido" required />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Por favor introduza no mínimo 8 caracteres de assunto" required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor escreva qualquer coisa para nós" placeholder="Caso queira inscrever-se como coletivo, envie-nos os seguintes dados: &#10;- Nome; &#10;- LEI (Legal Entity Identifier); &#10;- Email; &#10;- Quantidade de médicos a aderir à plataforma." required></textarea>
              <div class="validation"></div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LcVvnwUAAAAANGqb-hxV1lghFHWSem4E9akTVNH" style="padding-left:36%;"></div>

             <?php
             if (isset($_SESSION['msgVerificaRecaptcha'])) {
                 echo $_SESSION['msgVerificaRecaptcha'];
                 unset($_SESSION['msgVerificaRecaptcha']);
             }
             ?>
             <br>
            <div class="text-center"><button type="submit">Enviar mensagem</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">

    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2018 <strong>mednager</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../../landingPage/lib/jquery/jquery.min.js"></script>
  <script src="../../landingPage/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../landingPage/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../landingPage/lib/easing/easing.min.js"></script>
  <script src="../../landingPage/lib/superfish/hoverIntent.js"></script>
  <script src="../../landingPage/lib/superfish/superfish.min.js"></script>
  <script src="../../landingPage/lib/wow/wow.min.js"></script>
  <script src="../../landingPage/lib/venobox/venobox.min.js"></script>
  <script src="../../landingPage/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->


  <!-- Template Main Javascript File -->
  <script src="../../landingPage/js/main.js"></script>

  <script>


   window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);


  </script>
</body>

</html>

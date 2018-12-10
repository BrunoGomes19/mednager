<?php
include('../topos/topo_utente.php');

?>


            <!-- MAIN CONTENT-->
<link href="../../assets/css/style.css" rel="stylesheet">
<div class="content" >

<div class="main-content">
                <div class="section__content section__content--p30">


                    <div class="row">
                        <div class="col-md-12">

    <?php

      @session_start();

      if (isset($_SESSION['erro'])) {
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
      }

      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <br>
    <div class="card" style="width: 50%; margin:0 auto; text-align: center;">
      <div class="card-header">
          <strong>Alterar Password</strong>
      </div>
      <form action="alterarpassUser.php" method="post" class="form-horizontal" name="frmChange" onSubmit="return validatePassword()">
        <div class="card-body card-block">
            
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="hf-email" class=" form-control-label" style="color: #5FBACE;"><b>Password antiga</b></label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="password" id="velhapass" name="velhapass" placeholder="Por favor insira a password antiga..." class="form-control">
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label" style="color: #5FBACE;"><b>nova Password</b></label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="password" id="novapass" name="novapass" placeholder="Por favor insira a nova password..." class="form-control">
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label" style="color: #5FBACE;"><b>confirmação da nova Password</b></label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="password" id="novapassConfirmacao" name="novapassConfirmacao" placeholder="Por favor confirme a nova password..." class="form-control">
              </div>
          </div>
            
        </div>
        <div class="card-footer">
            
            <input type="submit" name="submit"
                        value="Alterar" class="btn btn-warning">                                        
        </div>
      </form>
    </div> 
    <br>
  </div>
</div>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->


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



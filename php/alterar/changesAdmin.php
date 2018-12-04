<?php
include('../topos/topo_admin.php');

?>


            <!-- MAIN CONTENT-->
<link href="../../assets/css/style.css" rel="stylesheet">

<div class="content" style="padding-top:8%;"> 
  <div class="content">
    <div class="col-lg-6">

    <?php

      @session_start();

      if (isset($_SESSION['erro'])) {
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
      }
      ?>
    <div class="card">
      <div class="card-header">
          <strong>Alterar</strong> Password
      </div>
      <form action="alterarpassAdmin.php" method="post" class="form-horizontal" name="frmChange" onSubmit="return validatePassword()">
        <div class="card-body card-block">
            
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="hf-email" class=" form-control-label">Password antiga</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="password" id="velhapass" name="velhapass" placeholder="Por favor insira a password antiga..." class="form-control">
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label">nova Password</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="password" id="novapass" name="novapass" placeholder="Por favor insira a nova password..." class="form-control">
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                  <label for="hf-password" class=" form-control-label">confirmação da nova Password</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="password" id="novapassConfirmacao" name="novapassConfirmacao" placeholder="Por favor confirme a nova password..." class="form-control">
              </div>
          </div>
            
        </div>
        <div class="card-footer">
            
            <input type="submit" name="submit"
                        value="ALTERAR" class="btnSubmit">                                        
        </div>
      </form>
    </div> 

    <?php

      @session_start();

      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>

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



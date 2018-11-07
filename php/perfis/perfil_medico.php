<?php
include('../topos/topo_medico.php');
?>

            <!-- MAIN CONTENT-->
              <link href="style.css" rel="stylesheet">

            <div class="content" style="padding-top:8%;">
                        <div class="container-fluid">

                                <div class="col-md-8">
                                    <div class="card">
                                      <div class="card-footer">
                                        <form action="../perfis/perfil_medico.php" method="GET" style ='float: left; padding: 5px;'>
            																			<button type="submit" class="btn btn-primary btn-sm" style="font-size:16px">
            																					<i class="fa fa-dot-circle-o"></i> Ver
            																			</button>&nbsp
                                        </form>
                                        <form action="../registos/registomedico.php" method="GET" style ='float: left; padding: 5px;'>
            																			<button type="submit" class="btn btn-danger btn-sm" style="font-size:16px">
            																					<i class="fa fa-dot-circle-o"></i> Editar
            																			</button>
                                         </form>
            																	</div>
                                        <div class="content">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label>Company (disabled)</label>
                                                            <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" placeholder="Username" value="michael23">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" placeholder="Company" value="Mike">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" placeholder="City" value="Mike">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="number" class="form-control" placeholder="ZIP Code">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>About Me</label>
                                                            <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="image">
                                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                        </div>
                                        <div class="content">
                                            <div class="author">
                                                 <a href="#">
                                                <img class="avatar border-gray" src="../../assets/images/users/1.jpg" alt="..."/>

                                                  <h4 class="title">Mike Andrew<br />
                                                     <small>michael24</small>
                                                  </h4>
                                                </a>
                                            </div>
                                            <p class="description text-center"> "Lamborghini Mercy <br>
                                                                Your chick she so thirsty <br>
                                                                I'm in that two seat Lambo"
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                            <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                            <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                                        </div>
                                    </div>
                                </div>



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

</body>

</html>
<!-- end document-->

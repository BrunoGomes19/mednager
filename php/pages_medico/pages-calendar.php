<?php
include('../topos/topo_medico.php');

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    
    
    <!-- Custom CSS -->
    <link href="../../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    

<meta charset="UTF-8">
<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}



/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}


</style>







</head>
<body>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">


                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">



                                
                                















                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-3 border-right p-r-0">
                                                        <div class="card-body border-bottom">
                                                            <h4 class="card-title m-t-10">Agenda pessoal</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div id="calendar-events" class="">
                                                                        <div class="calendar-events m-b-20" data-class="bg-info"><i class="fa fa-circle text-info m-r-10"></i>Event One</div>
                                                                        <div class="calendar-events m-b-20" data-class="bg-success"><i class="fa fa-circle text-success m-r-10"></i> Event Two</div>
                                                                        <div class="calendar-events m-b-20" data-class="bg-danger"><i class="fa fa-circle text-danger m-r-10"></i>Event Three</div>
                                                                        <div class="calendar-events m-b-20" data-class="bg-warning"><i class="fa fa-circle text-warning m-r-10"></i>Event Four</div>
                                                                    </div>
                                                                    <!-- checkbox -->
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="drop-remove">
                                                                        <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                                                    </div>
                                                                    <button id="myBtn">Open Modal</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="card-body b-l calender-sidebar">
                                                            <div id="calendar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BEGIN MODAL -->
                                <div>
                                <div id="myModal" class="modal">

                                  <!-- Modal content -->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <span class="close">&times;</span>
                                      <h2>Modal Header</h2>
                                    </div>
                                    <div class="modal-body">
                                      <p>Some text in the Modal Body</p>
                                      <p>Some other text...</p>
                                    </div>
                                    <div class="modal-footer">
                                      <h3>Modal Footer</h3>
                                    </div>
                                  </div>

                                </div>

                                </div>
                                </body>




























                                    

                                








                                
                            </div>
                            
                                
                    </div>


                </div>

                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>




    <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>




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
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
    </script>

    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
     <!-- this page js -->
    <script src="../../assets/libs/moment/min/moment.min.js"></script>
    <script src="../../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../../dist/js/pages/calendar/cal-init.js"></script>
    </script
</script>

</body>

</html>
<!-- end document-->

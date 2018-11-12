<?php
include('../topos/topo_medico.php');

?>
<meta charset="UTF-8">

<script>

   

    function guardaEspecialidade(esp){
        //todosMedicamentos()

    }


    function todosMedicamentos(str, esp) {    

        if (str == "") {
            document.getElementById("txtHint").innerHTML = "A lista de medicamentos será exibida aqui.";
            return;
        } else {
                document.getElementById("txtHint").innerHTML = "todos";
                if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","ajax-medicamentosPorEspecialidades/ajaxmedico-todosOsMedicamentos.php?q="+str+"&e="+esp,true);
                    xmlhttp.send();

           
        }



    
}


</script>



<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">


                    <div class="row">
                        <div class="col-md-12">





                            <h3 class="title-5 m-b-35">Lista de medicamentos</h3>



                                


                                                <?php  

                                                echo '
                                                    <!--TODOS-->
                                                        <div id="todospesquisa" style="display: block" >
                                                            <div class="table-data__tool" >
                                                                <div class="table-data__tool-left">
                                                                    <div class="rs-select2--light ">


                                                                            <div class="input-group" >

                                                                                <button class="btn btn-primary" disabled>
                                                                                    <i class="fa fa-search"></i>
                                                                                </button>

                                                                                <input type="text" id="input1-group2" name="input1-group2" placeholder="nome do medicamento" class="form-control" onkeyup="todosMedicamentos(this.value)">
                                                                            </div>                                            
                                                                            

                                                                            <!--só para ocupar o espaço-->
                                                                        <div class="dropDownSelect2"></div>
                                                                    </div>


                                                                </div>
                                                                <div class="btn-group" id="opcaoTodos">

                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Todas as especialidades</button>

                                                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                                        <button  type="button" tabindex="0" class="dropdown-item" >Todas</button>


                                                                ';


                                                $espDinamica='';
                                                $con = mysqli_connect('localhost','admin','Sutas4Ever2018','mydb');
                                                if (!$con) {
                                                    die('Could not connect: ' . mysqli_error($con));
                                                }


                                                    //lista de especialidades dinâmica
                                                    $sql = "SELECT descriEspecialidade from especialidade";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                       
                                                        
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {

                                                            $espDinamica = $row["descriEspecialidade"];

                                                            if($espDinamica != ""){
                                                                echo '


                                                                    <div id="espDinamica" tabindex="-1" class="dropdown-divider"></div>
                                                                    <button  type="button" tabindex="0" class="dropdown-item" >'.$espDinamica.'</button>


                                                                ';


                                                            }  
                                                        }
                                                    } else {
                                                        echo "0 resultados";
                                                        return -1;
                                                        
                                                    }




                                                    








                                                    $conn->close();

                                                ?>


                                            
                                            </div>
                                        </div>

                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">                                                            
                                        </div>
                                    </div>
                                </div>


                                








                                <div class="table-responsive table-responsive-data2">

                                    <div id="txtHint"><b>A lista de medicamentos será exibida aqui.</b></div>

                                        <!--<tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">john@example.com</span>
                                            </td>
                                            <td class="desc">iPhone X 64Gb Grey</td>

                                            <td>

                                                    <button type="button" class="btn btn-outline-primary">
                                                        <i class="fa fa-user"></i>&nbsp;Perfil</button>
                                                    <button type="button" class="btn btn-outline-danger">
                                                         <i class="fa fa-trash"></i>&nbsp; Remover</button>

                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>-->
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

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



</body>

</html>
<?php

include('../topos/header.php');

$sqlesp = "SELECT * from local";
$resultesp = $conn->query($sqlesp);

$sqlesp2 = "SELECT * from tipoServico";
$resultesp2 = $conn->query($sqlesp2);

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
        <!-- NECESSARIO UTILIZAR O JQUERY COMPLETO, PODENDO USAR O DO GOOGLE-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <link href='css/fullcalendar.min.css' rel='stylesheet'>
        <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print'>
        <link href='css/personalizado.css' rel='stylesheet'>
        <script src='js/moment.min.js'></script>
        <script src='js/fullcalendar.min.js'></script>
        <script src='locale/pt.js'></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

        <script>

            $(document).ready(function () {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    defaultDate: Date(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events


                    eventClick: function (event) {
                        $("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + event.id);

                        $('#visualizar #id').text(event.id);
                        $('#visualizar #title').text(event.title);
                        $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
+                        $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #pvpServico').text(event.pvpServico);
                        $('#visualizar #nSala').text(event.nSala);
                        $('#visualizar #observacoes').text(event.observacoes);
                        $('#visualizar #ccUtente').text(event.ccUtente);
                        //ver How do I get the text value of a selected option?
                        $('#visualizar #codTipoServico').text(event.descriTipoServico);
                        $('#visualizar #codLocal').text(event.descriLocal);

                        //alert($('#codLocals: selected').text());

                        $('#visualizar').modal('show');
                        return false;

                    },

                    selectable: true,
                    selectHelper: true,
                    select: function (start, end) {
                        $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
                        $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
                        $('#cadastrar').modal('show');
                    },

                    //https://fullcalendar.io/docs/events-json-feed
                    events: {
                        url: 'list_data.php',
                        cache: false
                    }
                });

            });

        </script>
    </head>
    <body>
        <div class="container"><br>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <div id='calendar'></div>
        </div>


        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Dados da intervenção</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="visualizar">
                            <dl class="row">
                                <dt class="col-sm-3">ID da intervenção</dt>
                                <dd id="id" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Título</dt>
                                <dd id="title" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Início</dt>
                                <dd id="start" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Fim</dt>
                                <dd id="end" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Preço (€)</dt>
                                <dd id="pvpServico" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Sala</dt>
                                <dd id="nSala" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Observações</dt>
                                <dd id="observacoes" class="col-sm-9"></dd>
                                <dt class="col-sm-3">CC Utente</dt>
                                <dd id="ccUtente" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Tipo de intervenção</dt>
                                <dd id="codTipoServico" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Local</dt>
                                <dd id="codLocal" class="col-sm-9"></dd>

                            </dl>
                            <!--Talvez de shit-->
                            <button class="btn btn-canc-vis btn-secondary">Editar</button>
                            <a href="" id="apagar_evento" class="btn btn-danger" role="button">Apagar</a>

                        </div>
                        <div class="form">
                            <form method="POST" action="proc_edit_evento.php">
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Título</label>
                                        <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Título da intervenção">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Cor</label>
                                        <select name="color" class="form-control" id="color">
                                            <option value="">Selecione</option>
                                            <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                            <option style="color:#0071C5;" value="#0071c5">Azul Turquesa</option>
                                            <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                            <option style="color:#5fbace;" value="#5fbace">Mednager</option>
                                            <option style="color:#ff8080;" value="#ff8080">Rosa</option>
                                            <option style="color:#4dff4d;" value="#4dff4d"> Alface</option>
                                            <option style="color:#b366ff;" value="#b366ff">Roxo</option>
                                            <option style="color:#adad85;" value="#adad85">Cinzento</option>
                                            <option style="color:#228B22;" value="#228B22">Verde</option>
                                            <option style="color:#ff1a1a;" value="#ff1a1a">Vermelho</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Data Inicial</label>
                                        <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Data Final</label>
                                        <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                    </div>
                                </div>

                                <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>CC Utente</label>
                                    <input type="number" class="form-control" name="ccUtente" id="ccUtente" placeholder="CC do utente">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Preço (€)</label>
                                    <input type="decimal" min="0" step="any" class="form-control" name="pvpServico" id="pvpServico" placeholder="Preço da intervenção (€)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Sala</label>
                                    <input type="number" class="form-control" name="nSala" id="nSala" placeholder="Sala">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Observações</label>
                                    <input type="text" class="form-control" name="observacoes" autocomplete="off" id="observacoes" placeholder="Observações">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Local</label>
                                    <select name="codLocal" class="form-control" id="codLocal">
                                        <option value="">Selecione</option>
                                        <option value="1">Cuf</option>
                                        <option value="2">Misericordia</option>
                                        <option value="3">Outro</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Tipo de intervenção</label>
                                    <select name="codTipoServico" class="form-control" id="codTipoServico">
                                        <option value="">Selecione</option>
                                        <option value="1">Consulta</option>
                                        <option value="2">Cirurgia</option>
                                        <option value="3">Outro</option>
                                    </select>
                                </div>
                            </div>




                                <input type="hidden" name="id" id="id">
                                <div class="form-group col-md-12">
                                    <!--Talvez de shit-->
                                    <button type="button" class="btn btn-canc-edit btn-danger">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Guardar Alterações</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Registar intervenção</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="proc_cad_evento.php">
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Título</label>
                                    <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Título da intervenção">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Cor</label>
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071C5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#5fbace;" value="#5fbace">Mednager</option>
                                        <option style="color:#ff8080;" value="#ff8080">Rosa</option>
                                        <option style="color:#4dff4d;" value="#4dff4d">Alface</option>
                                        <option style="color:#b366ff;" value="#b366ff">Roxo</option>
                                        <option style="color:#adad85;" value="#adad85">Cinzento</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#ff1a1a;" value="#ff1a1a">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Data Inicial</label>
                                    <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Data Final</label>
                                    <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>CC Utente</label>
                                    <input type="number" class="form-control" name="ccUtente" id="ccUtente" placeholder="CC do utente">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Preço (€)</label>
                                    <input type="decimal" min="0" step="any" class="form-control" name="pvpServico" id="pvpServico" placeholder="Preço da intervenção (€)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Sala</label>
                                    <input type="number" class="form-control" name="nSala" id="nSala" placeholder="Sala">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Observações</label>
                                    <input type="text" class="form-control" name="observacoes"  autocomplete="off" id="observacoes" placeholder="Observações">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-12">
                                  <label>Intervenção</label>
                                  <select name="codTipoServico" id="codTipoServico" class="form-control" required>
                                    <?php

                                    echo '  <option selected hidden value="">Selecione</option>';

                                    if ($resultesp2->num_rows > 0) {
                                      // output data of each row
                                      while($row = $resultesp2->fetch_assoc()) {

                                        $id = $row['codTipoServico'];

                                        $title = $row['descriTipoServico'];

                                            echo '<option value="'.$id.'">'.  $title .'</option>';

                                      }
                                    }

                                     ?>

                                   </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-12">
                                  <label>Local</label>
                                  <select name="codLocal" id="codLocals" class="form-control" required>
                                    <?php

                                    //echo '  <option selected hidden value="">Selecione</option>';


                                    if ($resultesp->num_rows > 0) {
                                      // output data of each row
                                      while($row = $resultesp->fetch_assoc()) {

                                        $codLocal = $row['codLocal'];

                                        $descriLocal = $row['descriLocal'];

                                            echo '<option value="'.$codLocal.'">'.  $descriLocal .'</option>';


                                      }
                                    }


                                     ?>




                                      </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-info">Registar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            //Mascara para o campo data e hora
            function DataHora(evento, objeto) {
                var keypress = (window.event) ? event.keyCode : evento.which;
                campo = eval(objeto);
                if (campo.value == '00/00/0000 00:00:00') {
                    campo.value = ""
                }

                caracteres = '0123456789';
                separacao1 = '/';
                separacao2 = ' ';
                separacao3 = ':';
                conjunto1 = 2;
                conjunto2 = 5;
                conjunto3 = 10;
                conjunto4 = 13;
                conjunto5 = 16;
                if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
                    if (campo.value.length == conjunto1)
                        campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto2)
                        campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto3)
                        campo.value = campo.value + separacao2;
                    else if (campo.value.length == conjunto4)
                        campo.value = campo.value + separacao3;
                    else if (campo.value.length == conjunto5)
                        campo.value = campo.value + separacao3;
                } else {
                    event.returnValue = false;
                }
            }


            $('.btn-canc-vis').on("click", function () {
                $('.form').slideToggle();
                $('.visualizar').slideToggle();
            });
            $('.btn-canc-edit').on("click", function () {
                $('.visualizar').slideToggle();
                $('.form').slideToggle();
            });
        </script>
    </body>
</html>

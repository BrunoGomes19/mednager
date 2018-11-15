<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
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
        <script src='locale/pt-br.js'></script>

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
                        $('#visualizar #id').val(event.id);
                        $('#visualizar #title').text(event.title);
                        $('#visualizar #title').val(event.title);
                        $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
                        $('#visualizar #color').val(event.color);
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
                        cache: true
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
                        <h4 class="modal-title text-center">Dados do Evento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="visualizar">
                            <dl class="row">
                                <dt class="col-sm-3">ID do Evento</dt>
                                <dd id="id" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Titulo do Evento</dt>
                                <dd id="title" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Inicio do Evento</dt>
                                <dd id="start" class="col-sm-9"></dd>
                                <dt class="col-sm-3">Fim do Evento</dt>
                                <dd id="end" class="col-sm-9"></dd>
                            </dl>
                            <a href="" id="apagar_evento" class="btn btn-danger" role="button">Apagar</a>
                        </div>   
                        <div class="form">
                            <form method="POST" action="proc_edit_evento.php">
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
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
                                            <option style="color:#8B4513;" value="#8B4513">Marrom</option>	
                                            <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                            <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                            <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                            <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                            <option style="color:#228B22;" value="#228B22">Verde</option>
                                            <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
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
                                <input type="hidden" name="id" id="id">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-warning">Salvar Alterações</button>

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
                        <h4 class="modal-title text-center">Cadastrar Evento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="proc_cad_evento.php">
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
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
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>	
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
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
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
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
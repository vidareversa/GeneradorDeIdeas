<?php

$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');
$msg = $date." IP: ".$ip."\n";
$filename = 'ip.txt';
file_put_contents($filename, $msg, FILE_APPEND);
?>
<html>
	<head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="css/alazar.css" />
            <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css" />
            <style type="text/css">
                body {
                    background:black;
                    color:white;
                }
                #asombro,  #idea{
                    font-size: 50px;
                    width: 500;
                    float: left;
                    margin-left: 50px;
                    height: auto;
                }

                .sinfo {
                    width:auto; height:auto;border:1px solid white;float:left;margin-left:5px;
                     -webkit-transition: all 0.3s ease;
                    -moz-transition: all 0.3s ease;
                    -o-transition: all 0.3s ease;
                    -ms-transition: all 0.3s ease;   
                }

                .alazar { 
                    cursor:pointer;
                }

                #primer, #segundo {
                    font-size: 50px;
                    font-family: ComicSans;
                } 

                .content {
                    margin-top: 200px;
                }
                
                #sinfonia {
                    margin-top: 300px;
                    margin-left: 10px;
                    padding:50px;
                }
                
                .clast {
                    margin-left: 10px;
                }
                
                #sidebar {
                    padding: 0px !important;
                }
                
            </style>
            <script>
            </script>
	</head>
	<body id="vida" onload="soportaStorage();">            
            <div class="containerr">
                <div class="row">
                    <div class="col-md-4" id="sidebar">
                        <ul>
                            <li><a onclick="dalePlay()" href="#"> 
                                    <span class="glyphicon glyphicon-play" aria-hidden="true">
                                    </span> 
                                    Play
                                </a>
                            </li>
                            <li><a onclick="stop()" href="#">
                                    <span class="glyphicon glyphicon-pause" aria-hidden="true">
                                    </span>

                                    Stop
                                </a>
                            </li> 
                            <li><a onclick="cambiar()" href="#this">
                                    <span class="glyphicon glyphicon-forward" aria-hidden="true">
                                    </span>
                                    Cambiar
                                </a>
                            </li>
                            <li><a href="#this" onclick="aplicar();">
                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                                    </span>
                                    Seleccionar
                                </a>
                            </li>
                            
                        </ul>
                        <div class="spacer" style="height:100px;"></div>
                        <ul>
                            <li><a href="#" onclick="alert('esto es un boton secreto, simplemente para \ndecirte y desearte mucha felicidad en tu vida')">&nbsp;</a></li>
                            <li><a href="#this" data-toggle="modal" data-target="#myModalAyuda" >
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true">
                                    </span>
                                    Preguntas frecuentes
                                </a>                                
                            </li>
                            <li><a href="#this" data-toggle="modal" data-target="#myModal" >
                                    <span class="glyphicon glyphicon-globe" aria-hidden="true">
                                    </span>
                                    Crear mis conceptos
                                </a>                                
                            </li>
                            <li>                                
                                <a href="#this">                                    
                                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                        <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-default" onclick="mostrarDefault()" title="Se mezclan conceptos preestablecidos en la pagina"> 
                                              Web 
                                          </button>
                                        </div>                                        
                                        <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-default" onclick="mostrarStorage()" title="Se mezclan los conceptos definidos por vos">
                                              Local 
                                          </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-default" onclick="mostrarSoftware()" title="Se mezclan conceptos preestablecidos relacionados a la industria del software"> 
                                              Soft
                                          </button>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                       
                    </div>
                    <div class="col-md-8">
                        <a href="#" data-toggle=".container" id="ident">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </a>                        
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6 alazar" id="primer" onclick="aplicar(this)" role="alert">
                                </div>
                                <div class="col-md-6 alazar" id="segundo" onclick="aplicar(this)" role="alert">
                                </div>                            
                                <div id="sinfonia">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!------- Modal -------->
            <div class="modal fade" id="myModal" style="color:black;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Separ&aacute; por una coma cada concepto nuevo (",").</h4>
                    <p>Ejemplo: "montañas, invisible, energia solar" (sin las comillas)</p>
                  </div>
                  <div class="modal-body" >
                      <textarea cols="70" rows="10" id="data"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="grabarData();$('#myModal').modal('hide');dalePlay()">Grabar los conceptos (y dale Play)</button>
                  </div>
                </div>
              </div>
            </div>

            <!------- Modal de AYUDA -------->
            <div class="modal fade" id="myModalAyuda" style="color:black;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Preguntas frecuentes (con amor)</h4>
                  </div>
                  <div class="modal-body" >
                    
                    <div class="bs-example">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Que es esta web?</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>Esta web es una  <b>mezcladora de conceptos</b>.</p>
                                        <p>&nbsp;</p>
                                        <p>Esta pensada originalmente para escritores. Para esos momentos donde se agota la creatividad, a veces solo hace falta un chispazo para disparar una nueva idea. Esta web te ayuda con eso</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. Como funciona?</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Existen varios conceptos preedefinidos en la web para que se mezclen entre si. Vos podes frenar la mezcladora en cualquier momento cuando dos conceptos que se combinen te lleguen a interesar o a ocacionar alguna emoci&oacute;n</p>
                                        <p>Como estos conceptos son limitados y a modo de ejemplo. En la opci&oacute;n "Crear mis conceptos" vas a poder cargar nuevos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. Los conceptos agregados quedan almacenados? </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Estos conceptos solo se almacenan en tu ordenador. Y se mantendran la proxima vez que entres a esta web, siempre que uses el mismo navegador (sin navegación incognito) y siempre que no elimines el caché del mismo</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">4. Que es "Web", "Local" y "Soft" ? </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>A fin que sea mas facil mezclar, estos botones te permitiran saber que conceptos queres mezclar</p>
                                        <ul>
                                            <li>Web: Son los conceptos definidos por defecto de esta pagina web </li>
                                            <li>Local: Son los conceptos definidos por ti, se le dice local, ya que solo quedaran almacenados localmente en tu navegación</li>
                                            <li>Soft: Son conceptos definidos (y en construcción) para generar ideas en la industria del desarrollo del software</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">5. Tengo otra duda </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Ante cualquier duda, no dudes en escribirme a <b> facundo.giardino@gmail.com </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="grabarData();$('#myModal').modal('hide');">Grabar la data</button>
                  </div>
                </div>
              </div>
            </div>            
            
            <!-- - - - - - - - - -->
            <script src="js/jquery.js"></script>
            <script src="libs/bootstrap/js/bootstrap.min.js"></script>
            <script src="js/core.js"></script>            
            <script src="js/init.js"></script>
	</body>        
</html>
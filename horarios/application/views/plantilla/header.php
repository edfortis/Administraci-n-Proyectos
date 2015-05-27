<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
   

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--estilo personalizado-->
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet">
    <!-- jQuery -->
    <link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui-1.11.4.custom/jquery-ui.smoth.css">
    <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
    <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
    <script src="<?php echo base_url();?>js/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <!--modal box-->
    <script src="<?php echo base_url();?>js/modalBox.js-master/modalBox-min.js"></script>
    
   
    <!-- Script para activar los tabs-->
    <script>
        
        $(function() {
            
            
            var horario = [];
            var uis = [];
            // script tabs-->
            $( "#tabs" ).tabs({
              beforeLoad: function( event, ui ) {
                ui.jqXHR.fail(function() {
                  ui.panel.html(
                    "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                    "If this wouldn't be a demo." );
                });
              }
            });
            
            // script drag and drop
            $(".fijarse").droppable({
              accept: ".draggable",
              scope: "tasks",
              drop:function(event, ui){
                  console.log(ui);
                  horario.push(this.id);
                  uis.push(ui);
                  ui.draggable.option({revert:false});
                  
                  
              }
            });
            
            //btn-guardar
            $('#btn-guardar').on('click',function(){
              $.ajax({
                  method: "POST",
                  url: "set",
                  data: {lista:horario }
              }).done(function( msg ) {
                    alert( "Data Saved: " + msg );
              });
            });
            //btn-revert
            $('#btn-revert').on('click', function(){
                
                var ui = uis.pop();
                
                console.log(ui);
                //console.log(ui.draggable.css("background","blue"));
                //ui.draggable.css("background","blue");
                
                //console.log(ui.helper.position().left);
               
                
                
            });
            
            
           //draggable
           $('.draggable').draggable({revert:true,scope:"tasks"});
           
           $('#usuario').on('click',function(){
               
                $(function() {
                    $( "#dialog" ).dialog({
                        modal: true
                    });
                }); 
               
           });
           
            
           
          
          });
          
    </script>

</head>

<body>
   
<div id="dialog" title="<?php echo ($tabla == null?  'Actualiza tu Perfil': 'Usuario');?>">
  <?php 
    //activar boton actualizar
   
    if($tabla == null){
  ?>
  
    <a href="<?php echo base_url();?>CDocentes/" title="Actualizar"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button></a>
  
  <?php
    }
  ?>
  <a href="<?php echo base_url();?>login/salir" title="Cerrar Sesión"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button></a>
  
</div>
    <!-- Navigation -->
    <nav class="navbar linea-gradada navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Horarios Escolares</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="<?php echo base_url();?>sitio/cargar/inicio">Horarios</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>catalogos">Catálogos</a>
                    </li>
                    <li>
                        <a href="#" title="Usuario" id="usuario" ><span class="glyphicon glyphicon-user"   style="font-size:16px;" aria-hidden="true"></span></a>
                    </li>
                    <!-- dropdown ejemplo
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    -->
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

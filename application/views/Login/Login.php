<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Sweetalert Libreria de modales -->
        <script src="<?php echo base_url(); ?>assets/js/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <!-- Mis estilos -->
        <link rel="stylesheet" href="<?php echo base_url();?>CSS/Estilos.css" type = "text/css" >
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Inicio</title>
    </head>
    <body>
        <input type="text" hidden value="<?php echo base_url(); ?>" id="base_input">
        <!-- Encabezado -->
        <!-- Termina Encabezado -->
        <div class="row" >
            <div class="col-md-2" align="center">
                
            </div>
            <!-- Termina el nombre del proyecto y barra de menú -->
        </div>
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 3%;">
                <p class="Nom_Proyecto">SISTEMA DE VOTACIONES</p>
            </div>
        </div>
        <!-- Termina Encabezado -->
        <!-- Empieza el container -->
        <div class="row justify-content-center">
            <div class="col-md-5" style="padding-bottom: 50px;">
                <div class="card grey-card">
                    <div class="card-body col-md-12">
                        <div class="container">
                            <form action="<?php echo base_url().'Login/Ctrl_Login/valid_user_pass'?>" method="POST"></form>
                            <div class="row">
                                <h5>Bienvenido(a) al Sistema de votaciones para SUMMER FEST</h5>
                            </div>
                            <br>
                            <div class="row">
                                Usuario
                                <input id="Log_Ingresar_Usuario"name="Log_Ingresar_Usuario"placeholder="Ingresar usuario"class="form-control"> 
                            </div>
                            <br>
                            <div class="row">
                                Contraseña
                                <input id="Log_Ingresar_Contraseña"name="Log_Ingresar_Contraseña"placeholder="Ingresar constraseña"class="form-control" type="password"> 
                            </div>
                            <br>
                            <div class="row">
                                <button type="submit" id="Log_Iniciar_Sesion"name="Log_Iniciar_Sesion"class="btn btn-blue btn-border"> Iniciar sesión</button>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <span><h6 id="Sesion_Invalida_Mensaje" style="color: red; display: none;">Sesión inválida</h6></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Termina el card -->
            </div> <!-- termina el col-md-10 -->
        </div><!-- termina el row de contenido de la pagina -->
    </body>
    <script src="<?php echo base_url(); ?>Js/JS_Login.js"></script>

    <footer class="footer">
        <br>
        <span>©2018 Sistema Control de Trabajadores. Todos los derechos reservados ZONA ZERO</span>
    </footer>
</html>
<div class="row">
<!-- Imagen circular -->
    <div class="col-md-2" align="center">
        <img class="ZZ_Cir" src="https://www.publicdomainpictures.net/pictures/140000/nahled/sun-1443875591Ea5.jpg" width="220px" alt="ZZ_Cir">
    </div>
    <!-- Nombre del proyecto y barra de menú -->
    <div class="col-md-9">
        <div class="row">
            <p class="Nom_Proyecto ">SISTEMA DE ADMINISTRACIÓN</p>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-9">
                <nav class="navbar-zz navbar-expand-sm navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Opciones del  menú -->
                    <div class="row collapse navbar-collapse" id="opciones">
                        <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario" class=" Menu" id="Perfiles" role="button">ALUMNOS</a>

                        <a class="Menu nav-item" href="<?php echo base_url(); ?>Equipo/Ctrl_Equipo" class=" Menu" id="navCategorias" role="button">
                        ADMINISTRACION DE EQUIPOS
                        </a>

                        <a class="Menu nav-item" href="<?php echo base_url(); ?>Proveedores/Ctrl_Proveedor" class=" Menu" id="" role="button">
                        ESTADISTICAS
                        </a>
                        <!-- Fin de Opciones del  menú -->
                    </div>
                </nav>
            </div>
            <div class="col-md-2" style="text-align: right; margin-left: 0px; margin-right: -2%;">
                <a class="Menu nav-item Active" href="#" id="salir" role="button" >SALIR</a>
            </div>
            <div class="col-md-1"></div> 
        </div>
    </div>
<!-- Termina el nombre del proyecto y barra de menú -->
</div>
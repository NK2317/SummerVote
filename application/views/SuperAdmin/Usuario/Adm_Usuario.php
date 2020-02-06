<!-- change the id  -->
<div class="row contenido">
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <strong><h5>Administrar alumnos</h5></strong> <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario/Registrar" id="Btn_Registrar_Usuario" name="Btn_Registrar_Usuario" class="btn btn-light btn-border"> Registro manual</a>
                <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario/Registrar_Excel" id="Btn_Registrar_Usuario" name="Btn_Registrar_Usuario" class="btn btn-light btn-border"> Registro con excel</a>
            </div>
        </div>
    </div>
</div><br>
<div class="row contenido" style="padding-bottom: 50px;">
    <div class="col-md-10">
        <form action="">
        <table id="Tab_Usuario" name="Tab_Usuario" class=" table table-striped table-bordered">
            <thead class="Tabla">
                <tr>
                    
                    <th>Nombre</th>
                    <th>Grado y grupo</th>
                    <th>Número de cuenta</th>
                    <th>Estatus</th>
                    <th width="20%">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="row">
                    <div class="col-md-2"></div>
                            <div class="col-md-3" style="align-content: center;">
                            <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario/Ver">
                                <img value="" name="ver" class="ver"onmouseover="mouseOverVer(this)"onmouseout="MouseoutVer(this)" src="<?php echo base_url(); ?>img/Iconos/Ver_01.png" alt="Ver">
                            </a>
                        </div>
                        <div class="col-md-3" style="align-content: center;">
                            <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario/Modificar">
                                <img id="" value="" class="Editar " onmouseover="mouseOverEditar(this)" onmouseout="MouseoutEditar(this)"  src="<?php echo base_url(); ?>img/Iconos/Editar_01.png"alt="Editar">
                            </a>
                        </div>
                        <div class="col-md-3" style="align-content: center;">
                            <a>
                                <img value="" class="Papelera" onmouseover="mouseOverPapelera(this)" onmouseout="MouseoutPapelera(this)" src="<?php echo base_url(); ?>img/Iconos/Papelera_01.png"alt="Papelera" data-toggle="modal">
                            </a>
                        </div>
                    </div>
                </td>
            </tr>               
            </tbody>
        </table>
        <br>
        </form>
        <div class="row">
        <div class="col-md-9"></div>
            </div>
    </div>
</div>
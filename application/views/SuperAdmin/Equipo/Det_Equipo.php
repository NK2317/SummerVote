<div >
    <div class="row contenido" style="padding-bottom: 50px;">
        <div class="col-md-10">
            <form action="" id="Visualizar_Equipo" method="post">
                <div class="card grey-card">
                    <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Visualizar equipo</h5> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Nombre del equipo:
                        <input type="text" class="form-control" id="nombre_equipo" readonly>
                    </div>
                    <div class="col-md-4">
                        Actividad:
                        <input type="text" class="form-control" id="actividad" readonly>
                    </div>
                    <div class="col-md-4">
                        Periodo:
                        <input name="periodo" id="periodo" class="form-control" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5>Usuarios dentro del equipo:</h5>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 tex-center">
                    <table id="Tab_Usuario_listados" name="Tab_Usuario" class=" table table-striped table-bordered">
                        <thead class="Tabla">
                            <tr>
                                
                                <th width="40%">Nombre</th>
                                <th>Grado y grupo</th>
                                <th>Número de cuenta</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>               
                        </tbody>
                    </table>
                    </div>
                </div>
                <br>
            </form>

            <div class="row">
                <div class="col-md-9">
                    <a href="<?php echo base_url(); ?>Equipo/Ctrl_Equipo" id="Btn_Regresar" name="Pro_Det_Btn_Regresar" class="btn btn-light btn-border">Regresar</a>
                </div>
                <div class="col-md-1" style="align-content: center;">
                    <a href="<?php echo base_url(); ?>Equipo/Ctrl_Equipo/Modificar">
                        <img id="" value="" class="Editar " onmouseover="mouseOverEditar(this)" onmouseout="MouseoutEditar(this)"  src="<?php echo base_url(); ?>img/Iconos/Editar_01.png"alt="Editar">
                    </a>
                </div>
                <div class="col-md-1" style="align-content: center;">
                    <a>
                        <img value="" class="Papelera" onmouseover="mouseOverPapelera(this)" onmouseout="MouseoutPapelera(this)" src="<?php echo base_url(); ?>img/Iconos/Papelera_01.png"alt="Papelera" data-toggle="modal">
                    </a>
                </div>
            </div>                           
        </div>
    </div>
</div>    
  </div>
     </div> 
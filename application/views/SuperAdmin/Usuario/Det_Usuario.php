<div >
    <div class="row contenido" style="padding-bottom: 50px;">
        <div class="col-md-10">
            <form action="asd" id="Registrar_Usuario" method="post">
                <div class="card grey-card">
                    <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Visualizar alumno</h5> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Datos de alumno</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Nombre completo:
                        <input type="text" class="form-control onlyText" id="nombre_completo" name="nombre_completo" readonly>
                        <span class="errorSpan" id="errorNombre"></span>
                    </div>
                    <div class="col-md-4">
                        Número de cuenta:
                        <input type="text" class="form-control onlyNumber" id="numero_cuenta" name="numero_cuenta" readonly>
                        <span class="errorSpan" id="errorNombre"></span>
                    </div>
                    <div class="col-md-4">
                        Bachillerato:
                        <input name="bachillerato" id="bachillerato" class="form-control" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Grado:
                        <input name="grado" id="grado" class="form-control" readonly>
                    </div>
                </div>
             
            <br>
            </form>
            <div class="row">
                <div class="col-md-9">
                    <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario" id="Btn_Regresar" name="Pro_Det_Btn_Regresar" class="btn btn-light btn-border">Regresar</a>
                </div>
                <div class="col-md-1" style="align-content: center;">
                    <a href="<?php echo base_url(); ?>Usuario/Ctrl_Usuario/Modificar">
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
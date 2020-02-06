<div >
    <div class="row contenido" style="padding-bottom: 50px;">
        <div class="col-md-10">
            <form action="" method="post">
                <div class="card grey-card">
                    <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Modificar usuario</h5> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Datos de usuario</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 content">
                        <span class="content"><span style="color:red;">*</span>Puesto:</span>
                        <select name="Sel_Puesto" id="Sel_Puesto" class="form-control" required>
                            <option value="0">Seleccione</option>
                        </select>
                        <span id="errorPuesto" style="color: red;display: none;">Selecciona un puesto</span>
                    </div>
                    <div class="col-md-8 content">
                        <span class="content"><span style="color:red;">*</span>Dirección:</span>
                        <select name="Sel_Direccion" id="Sel_Direccion" class="form-control" required>
                            <option value="0">Seleccione</option>
                        </select>
                        <span id="errorDireccion" style="color: red;display: none;">Selecciona una dirección</span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 content">
                        <span class="content"><span style="color:red;">*</span>Tipo de usuario:</span>
                        <select name="Sel_Tipo_Usuario" id="Sel_Tipo_Usuario" class="form-control" required>
                            <option value="0">Seleccione</option>
                        </select>
                        <span id="errorTipoUsuario" style="color: red;display: none;">Selecciona un tipo de usuario</span>
                    </div>
                    <div class="col-md-4 content">
                        <span class="content"><span style="color:red;">*</span>Usuario:</span>
                        <input id="Inp_Usuario" name="Inp_Usuario" class="form-control" required min="18" max="18" maxlength="18">
                        <span id="errorUsuario" style="color: red;display: none;">Campo incompleto</span>
                    </div>
                    <div class="col-md-4 content">
                            <span class="content"><span style="color:red;">*</span>Contraseña:</span>
                            <input id="Inp_Contraseña" name="Inp_Contraseña" class="form-control" required min="8" max="8" maxlength="8">
                            <span id="errorCURP" style="color: red;display: none;">Campo incompleto</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8 content">
                            <span class="content"><span style="color:red;">*</span>Nombre:</span>
                            <select name="Sel_Nombre_Completo" id="Sel_Nombre_Completo" class="form-control" required>
                                <option value="0">Seleccione</option>
                            </select>
                            <span id="errorNombreCompleto" style="color: red;display: none;">Selecciona un nombre</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Datos de contacto</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 content">
                        Correo electrónico: <br>
                        <input id="Inp_Correo_Electronico" name="Inp_Correo_Electronico" class="Solo_Lectura" disabled value>
                        </div>
                        <div class="col-md-2 content">
                        Teléfono: <br>
                        <input id="Inp_Telefono" name="Inp_Telefono" class="Solo_Lectura" disabled value>
                        </div>
                        <div class="col-md-2 content">
                        Extensión: <br>
                        <input id="Inp_Extension" name="Inp_Extension" class="Solo_Lectura" disabled value>  
                        </div>
                        <div class="col-md-2 content">
                        Celular: <br>
                        <input id="Inp_Celular" name="Celular" class="Solo_Lectura" disabled value>
                        </div>
                    </div>
                <br><!-- Botones -->
                <br>
             

            </form>

            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-light btn-border" id="Regresar">Regresar</button>
                </div>
                <div class="col-md-3 content">
                    <button class="btn btn-light btn-border" id="Guardar">Guardar</button>
                </div>
            </div>                          
        </div>
    </div>
</div>    
  </div>
     </div> 
<div >
    <div class="row contenido" style="padding-bottom: 50px;">
        <div class="col-md-10">
            <form action="asd" id="Registrar_Usuario" method="post">
                <div class="card grey-card">
                    <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Modificar alumno</h5> 
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
                        <input type="text" class="form-control onlyText" id="nombre_completo" name="nombre_completo">
                        <span class="errorSpan" id="errorNombre"></span>
                    </div>
                    <div class="col-md-4">
                        Número de cuenta:
                        <input type="text" class="form-control onlyNumber" id="numero_cuenta" name="numero_cuenta">
                        <span class="errorSpan" id="errorNombre"></span>
                    </div>
                    <div class="col-md-4">
                        Bachillerato:
                        <select name="bachillerato" id="bachillerato" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Grado:
                        <select name="grado" id="grado" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
             
            <br>
            </form>

            <div class="row">
                <div class="col-md-2">
                    <a class="btn btn-light btn-border" id="Regresar">Regresar</a>
                </div>
                <div class="col-md-3 content">
                    <a class="btn btn-light btn-border" id="Guardar">Guardar</a>
                </div>
            </div>                          
        </div>
    </div>
</div>    
  </div>
     </div> 
<div >
    <div class="row contenido" style="padding-bottom: 50px;">
        <div class="col-md-10">
            <form action="" id="Registrar_Usuario" method="post">
                <div class="card grey-card">
                    <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Registrar equipo</h5> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Nombre del equipo:
                        <input type="text" class="form-control" id="nombre_equipo">
                    </div>
                    <div class="col-md-4">
                        Actividad:
                        <input type="text" class="form-control" id="actividad">
                    </div>
                    <div class="col-md-4">
                        Periodo:
                        <select name="periodo" id="periodo" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5>Alumnos sin equipo:</h5>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 tex-center">
                    <table id="Tab_Usuario_sin_equipo" name="Tab_Usuario" class=" table table-striped table-bordered">
                        <thead class="Tabla">
                            <tr>
                                
                                <th width="40%">Nombre</th>
                                <th>Grado y grupo</th>
                                <th>Número de cuenta</th>
                                <th width="20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-success"><h6>+</h6></a>
                                </div>
                            </td>
                        </tr>               
                        </tbody>
                    </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5>Añadidos:</h5>
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
                                <th width="20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                <a class="btn btn-danger"><h6>-</h6></a>
                                </div>
                            </td>
                        </tr>               
                        </tbody>
                    </table>
                    </div>
                </div>
                <br>
            </form>

            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-light btn-border" id="Regresar">Regresar</button>
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
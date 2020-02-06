//---------muestra el modal " salir sin guardar" y regresa al administrador

$("#Regresar").click(function(){
    $("#modal_salir_singuardar").modal("show");
  });
  $("#confirm_salir_singuardar").click(function(){
    location.href = base_url+"Usuario/Ctrl_Usuario";
    });

  //-Muestra los modales para guardar información e imprimir el número de inventario

$("#Guardar").click(function(){
  $("#modal_guardar").modal("show");
});
$("#confirm_guardar").click(function(){
    $("#modal_guardar").modal("hide");
    $("#modal_guardar_confirmed").modal("show");
});
$("#confirm_registro").click(function(){
    $("#modal_guardar_confirmed").modal("hide");
    $("#modal_usuario_contrasena").modal("show");
});
$("#usuario_contrasena_acept").click(function(){
  $("#modal_usuario_contrasena").modal("hide");
});
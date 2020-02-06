var tabla=$('#Tab_Usuario').DataTable( {
	    "language": {
	      "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	    }
	});

  //-----------Muestra modal para renovar el registro--------------------

  $(".Activar").click(function(){
    $("#modal_Activar").modal("show");
});
    $("#confirm_Activar").click(function(){
    $("#modal_Activar").modal("hide");
});

$(document).ready(function(){
	var base_url = $("#url_base");
	//Estilos de bootstrap para botones de los modales
	const swalBootstrap = Swal.mixin({
		customClass:{
			confirmButton:'btn btn-blue',
			cancelButton:'btn btn-red'
		},
		buttonsStyling:false
	});
	//funcion que cierra sesion cuando el usuairo abandona la pagina
	function cerrar_sesion_abandono(){
		$.ajax({
			url: base_url+'Login/Ctrl_Login/log_out',
			type: 'GET',
			success: function(){
				localStorage.clear();
			}
		});
	}

	function cerrar_sesion(){
		$.ajax({
			url: base_url+'Login/Ctrl_Login/log_out',
			type: 'GET',
			success: function(response){
				localStorage.clear();
				window.location.href=base_url+"Login/Ctrl_Login";
			}
		});
		$("#modal_exit").modal("hide");
	}


	$("#salir").click(function(){
		// $("#modal_exit").modal("show");
		swalBootstrap.fire({
			title:'<h4 align="center">¿Deseas cerrar sesión?</h4>',
			type:'warning',
			showCloseButton:true,
			showCancelButton:true,
			confirmButtonText:'Aceptar',
			cancelButtonText: 'Cancelar',
			reverseButtons:true
		}).then((result)=>{
			if (result.value) {
				cerrar_sesion();
			}
		});
	});
});

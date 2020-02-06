$(document).ready(function(){
	var base_url = $("#base_input").val();
	var params = {
		"Id_Usuario": localStorage.getItem("id_usuario")
	}
	$.ajax({
		data: params,
		url: base_url+'Usuario/Ctrl_Usuario/ShowUsuarioWithId',
		type:'POST',
		success: function(response){
			var r = JSON.parse(response);
			for(var i =0; i<r.length; i++){
				$("#CURP").val(r[i].CURP);
				$("#nombre").val(r[i].Nombre);
				$("#primer_apellido").val(r[i].Primer_Apellido);
				$("#segundo_apellido").val(r[i].Segundo_Apellido);
				$("#id_area").val(r[i].Area);
				$("#jefe_inmediatos").val(r[i].Nombre_Jefe);
				$("#correo").val(r[i].Correo_Electronico);
				$("#password").val(r[i].Password);
				$("#tipo_usuario").val(r[i].Tipo_Usuario);
			}
		}
	});
	$("#message").append("el usuario");
	$(".Papelera").click(function(){
		$("#modal_baja").modal("show");
	});
	$("#confirm_baja").click(function(){
		params = {
			"Id_Usuario": localStorage.getItem("id_usuario")
		}
		$.ajax({
			data: params,
			url: base_url+'Usuario/Ctrl_Usuario/BajaUsuario',
			method: "POST",
			success: function(response){
				if(response==0){
					alert("no se pudo");
				}
				$("#modal_baja").modal("hide");
			  	$("#modal_baja_confirmed").modal("show");
			  	$("#baja_exitosa_acept").click(function(){
			  		location.reload();
			  	});
			}
		}).then(function(){
			localStorage.removeItem('id_usuario');
		});
	});
})
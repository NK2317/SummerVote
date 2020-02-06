$(document).ready(function(){
	var base_url = $("#base_input").val();
	var areas = {
		"Cat": "Areas"
	}
	$.ajax({
		data: areas,
	 	url: base_url+'Usuario/Ctrl_Usuario/ShowCat',
	 	type: 'POST',
	 	success: function(response){
	 		var r = JSON.parse(response);
	 		for(var i =0; i<r.length; i++){
	 			$("#id_area").append("<option value="+r[i].Id_Area+">"+r[i].Area+"</option>");
	 		}
	 	}
	});
	var jefes = {
		"Cat": "Jefes"
	}
	$.ajax({
		data: jefes,
	 	url: base_url+'Usuario/Ctrl_Usuario/ShowCat',
	 	type: 'POST',
	 	success: function(response){
	 		var r = JSON.parse(response);
	 		for(var i =0; i<r.length; i++){
	 			$("#jefe_inmediato").append("<option value="+r[i].Id_Jefe+">"+r[i].Nombre_Jefe+"</option>");
	 		}
	 	}
	})
	var tipo = {
		"Cat": "Tipo"
	}
	$.ajax({
		data: tipo,
		url: base_url+'Usuario/Ctrl_Usuario/ShowCat',
	 	type: 'POST',
	 	success: function(response){
	 		var r = JSON.parse(response);
	 		for(var i=0; i<r.length; i++){
	 			$("#tipo_usuario").append("<option value="+r[i].Id_Tipo+">"+r[i].Tipo_Usuario+"</option>");
	 		}
	 	}
	})
	var params = {
		"Id_Usuario": localStorage.getItem("id_usuario")
	}
	console.log(params);
	$.ajax({
		data:params,
		url: base_url+'Usuario/Ctrl_Usuario/ShowUsuarioWithId',
		type: 'POST',
		success: function(response){
			var r = JSON.parse(response);
			for (var i=0; i<r.length; i++){
				$("#CURP").val(r[i].CURP);
				$("#nombre").val(r[i].Nombre);
				$("#primer_apellido").val(r[i].Primer_Apellido);
				$("#segundo_apellido").val(r[i].Segundo_Apellido);
				$("#tipo_usuario").val(r[i].Id_Tipo);
				$("#id_area").val(r[i].Id_Area);
				$("#jefe_inmediato").val(r[i].Id_Jefe_Inmediato);
				$("#correo").val(r[i].Correo_Electronico);
				$("#password").val(r[i].Password);
				$("#password-conf").val(r[i].Password);
			}
		}
	});
	$("#Guardar").click(function(){
		if (($("#CURP").val()!=0)&&($("#nombre").val()!=0)
			&&($("#primer_apellido").val()!=0)
			&&($("#segundo_apellido").val()!=0)
			&&($("#tipo_usuario").val()!=0)		
			&&($("#correo").val()!=0)
			&&($("password").val()!=0)
			&&($("passwordConfirm").val()!=0))
		{
	  		$("#modal_guardar").modal("show");
		}
		else if($("#CURP").val()==0){
			$("#errorCURP").css("display","block");
		}
		else if($("#nombre").val()==0){
			$("#errorNombre").css("display","block");
		}	
		else if($("#primer_apellido").val()==0){
			$("#errorPrimerApellido").css("display","block");
		}
		else if($("#tipo_usuario").val()==0){
			$("#errorTipoUsuario").css("display","block");
		}
		else if($("#id_area").val()==0){
			$("#errorIdArea").css("display","block");
		}
		else if($("#jefe_inmediato").val()==0){
			$("#errorJefe").css("display","block");
		}
		else if($("#correo").val()==0){
			$("#errorCorreo").css("display","block");
		}
		else if($("#password").val()==0){
			$("#errorPassword").css("display","block");
		}
		else if($("#passwordConfirm").val()==0){
			$("#errorPasswordConf").css("display","block");
		}
	});
	$("#confirm_guardar").click(function(){
		$("#modal_guardar").modal("hide");
		var parametros = {
		 	"curp": $("#CURP").val(),
		 	"nombre": $("#nombre").val(),
		 	"primer_apellido" : $("#primer_apellido").val(),
		 	"segundo_apellido": $("#segundo_apellido").val(),
		 	"tipo_usuario": $("#tipo_usuario").val(),
		 	"id_area": $("#id_area").val(),
		 	"jefe_inmediato": $("#jefe_inmediato").val(),
		 	"correo": $("#correo").val(),
		 	"password": $("#password").val(),
		 	"persona_id": null,
		 	"usuario_id": localStorage.getItem("id_usuario")
		}
		$.ajax({
		 	data: parametros,
		 	url: base_url+'Usuario/Ctrl_Usuario/UpdateUsuario',
		 	type: 'POST',
		 	success: function(response){
		 		console.log(parametros);
		 		if (response!=1) {
		 			$("#modal_duplicado").modal("show");
		 			$("#duplicado_acept").modal("hide");
		 		}else{
		 			$("#modal_guardar_confirmed").modal("show");
		 		}
		 	}
		})
	});
	$("#tipo_usuario").on("change",function(){
		var flag = $("#tipo_usuario").val();
		if(flag == "1"){
			$("#area_col").css("display","block");
			$("#jefe_inmediato_col").css("display","block");
		}
		else{
			$("#area_col").css("display","none");
			$("#jefe_inmediato_col").css("display","none");
		}
	})
});
$(document).ready(function(){
	var base_url = $("#base_input").val();
	$("#Log_Iniciar_Sesion").click(function(){
		window.location.href=base_url+"Home/Ctrl_Home";
	});
})
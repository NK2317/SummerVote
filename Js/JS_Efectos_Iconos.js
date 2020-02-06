var base_url = "http://localhost/SummerVote/";

//   Mouse over Seguimiento
//   Mouse over Visualizar
function mouseOverVer(obj) {
    obj.src= base_url+"img/Iconos/Ver_02.png";
  }
  
  function MouseoutVer(obj) {
    obj.src=base_url+"img/Iconos/Ver_01.png";
  }
//   Mouse over Editar
function mouseOverEditar(obj) {
    obj.src = base_url+"img/Iconos/Editar_02.png";
  }
  
  function MouseoutEditar(obj) {
    obj.src = base_url+"img/Iconos/Editar_01.png";
    
  }

//   Mouse over Eliminar
function mouseOverPapelera(obj) {
    obj.src = "http://localhost/SummerVote/img/Iconos/Papelera_02.png";
  }
  
function MouseoutPapelera(obj) {
    obj.src = "http://localhost/SummerVote/img/Iconos/Papelera_01.png"
    
}

//   Mouse over Renovar

function mouseOverRenovar(obj) {
    obj.src = base_url+"img/Iconos/Renovar_02.png";
  }
  
function MouseoutRenovar(obj) {
    obj.src = base_url+"img/Iconos/Renovar_01.png";
    
  }


//   Mouse over Activar

function mouseOverActivar(obj) {
    obj.src = base_url+"img/Iconos/Activar_02.png";
  }
  
function MouseoutActivar(obj) {
    obj.src = base_url+"img/Iconos/Activar_01.png";
    
  }






// <!-- onmouseover y mouseoutover son para cmabiar los iconos  -->
// <a  href=""><img id="Ver" class="ver onmouseout="MouseoutVer()"  src="<?php echo base_url();?>../img/Iconos/Ver_01.png" alt="Ver"></a>
// <a href=""><img  id="Editar" class="Editar " onmouseover="mouseOverEditar()" onmouseout="MouseoutEditar()"  src="<?php echo base_url();?>../img/Iconos/Editar_01.png" alt="Editar"></a>
// <a href=""> <img id="Papelera" class="Papelera " onmouseover="mouseOverPapelera()" onmouseout="MouseoutPapelera()"  src="<?php echo base_url();?>../img/Iconos/Papelera_01.png" alt="Papelera"></a>



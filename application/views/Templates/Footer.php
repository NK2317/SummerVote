<!-- Js de las paginas -->
<script src="<?php echo base_url(); ?>Js/JS_Menu.js"></script>
<script src="<?php echo base_url(); ?>Js/JS_Efectos_Iconos.js"></script>
<script>src="<?php echo base_url(); ?>Js/JS_Modales.js"</script>
<script>src="<?php echo base_url(); ?>Js/sessions.js"</script>
<!-- GRAPHYCS BY Plotly.js -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<?php
$currentURL = current_url();
if($currentURL == base_url()."index.php/Usuario/Ctrl_Usuario"){ ?>
<script src="<?php echo base_url(); ?>Js/JS_Usuario.js"></script>
<script src="<?php echo base_url(); ?>Js/JS_Usuario_Baja.js"></script>
<?php } ?>

<?php
$currentURL = current_url();
if($currentURL == base_url()."index.php/Usuario/Ctrl_Usuario/Registrar"){ ?>
<script src="<?php echo base_url(); ?>Js/JS_Usuario_Reg.js"></script>
<?php } ?>

<?php
$currentURL = current_url();
if($currentURL == base_url()."index.php/Usuario/Ctrl_Usuario/Modificar"){ ?>
<script src="<?php echo base_url(); ?>Js/JS_Usuario_Reg.js"></script>
<?php } ?>

<?php
$currentURL = current_url();
if($currentURL == base_url()."index.php/Usuario/Ctrl_Usuario/Ver"){ ?>
<script src="<?php echo base_url(); ?>Js/JS_Usuario_Baja.js"></script>
<script src="<?php echo base_url(); ?>Js/JS_Usuario.js"></script>
<?php } ?>

<?php
$currentURL = current_url();
if($currentURL == base_url()."index.php/Equipo/Ctrl_Equipo"){ ?>
<script src="<?php echo base_url(); ?>Js/JS_Equipo.js"></script>
<?php } ?>


<footer class="footer">
	<br>
	<span>©2020 BACHILLERATO 25 (dev by Vladimir & Sergio)</span>
</footer>

</html>




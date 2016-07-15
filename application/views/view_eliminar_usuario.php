<h1>Eliminar usuario</h1>
estas seguro? de eliminar a: <?php echo $datos_contacto[0]->nombre ?><br />

<?php
	$input_con_id = array
		(
			"con_id" => $datos_contacto[0]->id
		)
?>

<?php echo form_hidden($input_con_id) ?>
	<?php echo form_submit("btn_enviar","Eliminar") ?>
<?php echo form_close() ?>
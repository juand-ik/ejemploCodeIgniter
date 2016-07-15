<h1>Contacto</h1>

<?php
	$input_nombre = array
		(
			"name"=>"nombre",
			"id"=>"input_nombre",
			"maxlength"=>"120",
			"size"=>"100",
			"value"=> set_value("input_nombre",@$datos_contacto[0]->nombre)
		);
	$input_mail = array
		(
			"name"=>"input_mail",
			"id"=>"input_mail",
			"maxlength"=>"120",
			"size"=>"100",
			"value"=> set_value("input_mail")
		);
	$input_desc = array
		(
			"name"=>"descripcion",
			"id"=>"input_desc",
			"maxlength"=>"120",
			"size"=>"100",
			"value"=> set_value("input_desc",@$datos_contacto[0]->descripcion)
		);
	$option_act = array
		(
			"0"=>"Inactivo",
			"1"=>"Activo",
		);
?>

<?php echo validation_errors(); ?>
<?php echo form_open() ?>
	<?php echo form_label("Nombre",'lbl_nombre') ?><br />
	<?php echo form_input($input_nombre) ?><br /><br />
	<?php //echo form_label("Email",'lbl_nombre') ?><br />
	<?php //echo form_input($input_mail) ?><br /><br /><?php //echo form_error("input_mail") ?>
	<?php echo form_label("Descripcion",'lbl_desc') ?><br />
	<?php echo form_input($input_desc) ?><br /><br />
	<?php echo form_label("Estatus",'lbl_est') ?><br />
	<?php echo form_dropdown("estatus",$option_act,set_value("input_nombre",@$datos_contacto[0]->estatus)) ?><br /><br />
	<?php echo form_submit("btn_enviar","Guardar") ?>
<?php echo form_close() ?>
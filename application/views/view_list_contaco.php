<?php
	//echo $nombre." - ".$nombre2;
	if (empty($listado))
		{
			//echo "sin contactos"; ?>
			<h1>Sin contactos</h1>
<?php		}
		else { ?>
			<h1>Tienes <?php echo count($listado) ?> Contacto(s)</h1>
			<br /><br />
			
			<?php foreach ($listado as $contacto){ ?>
			<?php echo $contacto->nombre  ?>
			<a href="<?php echo base_url() ?>index.php/contactos/modificar/<?php echo $contacto->id  ?>">Editar</a>
			-
			<a href="<?php echo base_url() ?>index.php/contactos/eliminar/<?php echo $contacto->id  ?>">Eliminar</a>
			<br /><br />
			<?php } ?>
<?php } ?>
<br /><br /><br /><br />
<a href="<?php echo base_url() ?>index.php/contactos/agregar">Nuevo Contacto</a>
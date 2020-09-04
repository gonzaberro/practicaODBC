<?php

include "connection.php";

$filtro = $_POST["filtro"];

$sql = 'SELECT cli.*,c.*,p.* from customer cli'.
' inner join address a on cli.address_id = a.address_id'.
' inner join city c on a.city_id = c.city_id'.
' inner join country p on c.country_id = p.country_id order by first_name asc';

if ($filtro != "") {
	$sql = 'SELECT cli.*,c.*,p.* from customer cli'.
	  ' inner join address a on cli.address_id = a.address_id'.
	  ' inner join city c on a.city_id = c.city_id'.
	  ' inner join country p on c.country_id = p.country_id'.
	  ' where'.
	  ' city like "%' . $filtro . '%" or '.
	  ' first_name like "%' . $filtro . '%" or '.
	  ' last_name like "%' . $filtro . '%" order by first_name asc';
}

$rs = odbc_exec($odbc_connection, $sql);

?>

<div>

	<div class="containerTablaClientes" >
		<div class="row">
			<div class="col-md-2 headerCustomers" style=" border-radius:5px 0px 0px 0px;">Nombre</div>
			<div class="col-md-2 headerCustomers">Apellido</div>
			<div class="col-md-2 headerCustomers">Ciudad</div>
			<div class="col-md-2 headerCustomers">País</div>
			<div class="col-md-2 headerCustomers">Editar</div>
			<div class="col-md-2 headerCustomers" style=" border-radius:0px 5px 0px 0px;">Estado</div>
		</div>

		<?php

		 while (odbc_fetch_row($rs)) { ?>

			<div class="row infoCustomer">
				<div class="col-md-2 dataRow"><?php echo odbc_result($rs, 'first_name') ?></div>
				<div class="col-md-2 dataRow"><?php echo odbc_result($rs, 'last_name') ?></div>
				<div class="col-md-2 dataRow"><?php echo odbc_result($rs, 'city')?></div>
				<div class="col-md-2 dataRow"><?php echo odbc_result($rs, 'country') ?></div>
				<div class="col-md-2 dataRow"><button class="btn btn-primary fullWidth" onclick="showModal(<?php echo odbc_result($rs, 'customer_id')?>,1)">Editar</button></div>
			
				<?php if (odbc_result($rs,'active') == 1){ 
					echo "<div class=\"col-md-2 dataRow\"><button class=\"btn btn-danger fullWidth\" onclick=\"bajarCliente(".odbc_result($rs, 'customer_id').")\">Desactivar</button></div>";
				}else if (odbc_result($rs,'active') == 0){
					echo "<div class=\"col-md-2 dataRow\"><button class=\"btn btn-success fullWidth\" onclick=\"activarCliente(".odbc_result($rs, 'customer_id').")\">Activar</button></div>";
				}?>

			</div>
		<?php }?>

	</div>
</div>
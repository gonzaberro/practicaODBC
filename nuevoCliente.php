<?php

include "connection.php";

$sql2 = 'SELECT * from store';

$rs2 = odbc_exec($odbc_connection, $sql2);
?>
<form id="modalForm">
    <h6> Datos del Cliente </h6>
    <div class="row">
        <input type="hidden" name="customer_id"  id="customer_id" value="0">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="email" class="form-control" name="nombre" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Apellido</label>
                <input type="email" class="form-control" name="apellido" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlSelect2">Store</label>
                <select class="form-control" name="store">

                    <?php while (odbc_fetch_row($rs2)) { ?>
                        <option value="<?php echo odbc_result($rs2, 'store_id') ?>">
                            <?php echo odbc_result($rs2, 'store_id') ?>
                        </option>";
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-check containerCheckBox">
                <input type="checkbox" class="form-check-input checkBox" name="activo" checked="true">
                <label class="form-check-label" style="margin-left:10px">Estado Activo</label>
            </div>
        </div>
    </div>

    <hr>
    <?php





    $sql4 = 'SELECT * from city';

    $rs4 = odbc_exec($odbc_connection, $sql4);
    ?>
      <h6> Dirección del Cliente </h6>
    <div class="row">
        <input type="hidden" name="address_id" id="address_id" value="0">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">1º Dirección</label>
                <input type="email" class="form-control" name="direccion" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">2º Dirección</label>
                <input type="email" class="form-control" name="direccion2" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Distrito</label>
                <input type="email" class="form-control" name="distrito" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Código Postal</label>
                <input type="email" class="form-control" name="codigopostal" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Teléfono</label>
                <input type="email" class="form-control" name="telefono" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlSelect2">Ciudad</label>
                <select class="form-control" name="ciudad">

                    <?php while (odbc_fetch_row($rs4)) { ?>
                        <option value="<?php echo odbc_result($rs4, 'city_id') ?>">
                            <?php echo odbc_result($rs4, 'city') ?>
                        </option>";
                    <?php } ?>

                </select>
            </div>
        </div>
    </div>
<form>
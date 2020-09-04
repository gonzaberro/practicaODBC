<?php

include "connection.php";

$customer = $_POST["customer"];

$sql = 'SELECT * from customer where customer_id=' . $customer;

$rs = odbc_exec($odbc_connection, $sql);

$sql2 = 'SELECT * from store';

$rs2 = odbc_exec($odbc_connection, $sql2);


while (odbc_fetch_row($rs)) { ?>
    <form id="modalForm">
        <h6> Datos del Cliente </h6>
        <div class="row">
            <input type="hidden" name="customer_id"  id="customer_id" value=<?php echo odbc_result($rs, 'customer_id') ?>>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="email" class="form-control" name="nombre" value="<?php echo odbc_result($rs, 'first_name') ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="email" class="form-control" name="apellido" value="<?php echo odbc_result($rs, 'last_name') ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo odbc_result($rs, 'email') ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Store</label>
                    <select class="form-control" name="store">

                        <?php while (odbc_fetch_row($rs2)) { ?>
                            <option <?php echo odbc_result($rs2, 'store_id') == odbc_result($rs, 'store_id') ? "selected" : "" ?> value="<?php echo odbc_result($rs2, 'store_id') ?>">
                                <?php echo odbc_result($rs2, 'store_id') ?>
                            </option>";
                        <?php } ?>

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-check containerCheckBox">
                    <input type="checkbox" class="form-check-input checkBox" name="activo" <?php echo odbc_result($rs, 'active') == 1 ? " checked=\"true\" " :  ""  ?>>
                    <label class="form-check-label" style="margin-left:10px">Estado Activo</label>
                </div>
            </div>
        </div>

        <hr>
        <?php

        $sql3 = 'SELECT * from address where address_id = ' . odbc_result($rs, 'address_id');

        $rs3 = odbc_exec($odbc_connection, $sql3);

        while (odbc_fetch_row($rs3)) {

            $sql4 = 'SELECT * from city';

            $rs4 = odbc_exec($odbc_connection, $sql4);
        ?>
          <h6> Dirección del Cliente </h6>
            <div class="row">
                <input type="hidden" name="address_id" id="address_id" value=<?php echo odbc_result($rs3, 'address_id') ?>>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">1º Dirección</label>
                        <input type="email" class="form-control" name="direccion" value="<?php echo odbc_result($rs3, 'address') ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">2º Dirección</label>
                        <input type="email" class="form-control" name="direccion2" value="<?php echo odbc_result($rs3, 'address2') ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Distrito</label>
                        <input type="email" class="form-control" name="distrito" value="<?php echo odbc_result($rs3, 'district') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Código Postal</label>
                        <input type="email" class="form-control" name="codigopostal" value="<?php echo odbc_result($rs3, 'postal_code') ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono</label>
                        <input type="email" class="form-control" name="telefono" value="<?php echo odbc_result($rs3, 'phone') ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Ciudad</label>
                        <select class="form-control" name="ciudad">

                            <?php while (odbc_fetch_row($rs4)) { ?>
                                <option <?php echo odbc_result($rs3, 'city_id') == odbc_result($rs4, 'city_id') ? "selected" : "" ?> value="<?php echo odbc_result($rs4, 'city_id') ?>">
                                    <?php echo odbc_result($rs4, 'city') ?>
                                </option>";
                            <?php } ?>

                        </select>
                    </div>
                </div>
            </div>


        <?php } ?>
    <form>
        <?php } ?>
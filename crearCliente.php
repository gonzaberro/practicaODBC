<?php


include "connection.php";

$activo =  isset($_POST["activo"]) ? 1 : 0;

$sql = 'INSERT INTO `sakila`.`address`
(`address_id`,
`address`,
`address2`,
`district`,
`city_id`,
`postal_code`,
`phone`,
`location`,
`last_update`)' .
    'VALUES
(0,"' . $_POST["direccion"] .
    '","' . $_POST["direccion2"] .
    '","' . $_POST["distrito"] .
    '",' . $_POST["ciudad"] .
    ',' . $_POST["codigopostal"] .
    ',' . $_POST["telefono"] .
    ',POINT(0,0),now())';

    odbc_exec($odbc_connection, $sql);

$sql2 = "select address_id from address order by last_update desc limit 1";

$rs = odbc_exec($odbc_connection, $sql2);

$address_id = 0;

while ($rows = odbc_fetch_object($rs)) { 
    $address_id = $rows->address_id ;
}

    $sql3 = 'INSERT INTO `sakila`.`customer`
    (`customer_id`,
    `store_id`,
    `first_name`,
    `last_name`,
    `email`,
    `address_id`,
    `active`,
    `create_date`,
    `last_update`)'.
    'VALUES
    (0,
    '.$_POST["store"].
    ',"'.$_POST["nombre"].'"
    ,"'.$_POST["apellido"].'"
    ,"'.$_POST["email"].'"
    ,'.$address_id.
    ','.$activo.
    ',now(),now())';

    $rs = odbc_exec($odbc_connection, $sql3);

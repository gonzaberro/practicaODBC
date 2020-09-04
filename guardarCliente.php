<?php 


/*
echo "address_id".$_POST["address_id"];
echo "direccion".$_POST["direccion"];
echo "direccion2".$_POST["direccion2"];
echo "distrito".$_POST["distrito"];
echo "codigopostal".$_POST["codigopostal"];
echo "telefono".$_POST["telefono"];
echo "ciudad".$_POST["ciudad"];-*/

include "connection.php";

$activo =  isset($_POST["activo"]) ? 1 :0;

$sql = 'update customer set'. 
' first_name="'.$_POST["nombre"].'" ,'. 
' last_name= "'.$_POST["apellido"] .'" ,'.
' email="'.$_POST["email"].'",'.
' store_id='.$_POST["store"].',active='.$activo.
' where customer_id='.$_POST["customer_id"];

$rs = odbc_exec($odbc_connection, $sql);

$sql2 = 'update address set'.
' address="'.$_POST["direccion"].'",'.
' address2="'.$_POST["direccion2"].'",'.
' district="'.$_POST["distrito"].'",'.
' postal_code='.$_POST["codigopostal"].",".
' phone='.$_POST["telefono"].",".
' city_id='.$_POST["ciudad"]." where address_id=".$_POST["address_id"];
echo $sql2;
$rs = odbc_exec($odbc_connection, $sql2);
?>
<?php

include "connection.php";

$customer = $_POST["customer"];

$sql = 'update customer set active=0 where customer_id='.$customer;

$rs = odbc_exec($odbc_connection, $sql);

?>
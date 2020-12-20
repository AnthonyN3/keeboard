<?php
//pname, desc, qtty, price, product_id

require_once 'database.php';
session_start();

$pname = $connection->real_escape_string($_POST['pname']);
$desc = $connection->real_escape_string($_POST['desc']);
$qtty = $connection->real_escape_string($_POST['qtty']);
$price = $connection->real_escape_string($_POST['price']);


if ($_POST['pname'] != '')
{
    $connection->query("UPDATE products SET pname = '$pname' WHERE id = {$_POST['product_id']}");
}
if ($_POST['desc'] != '')
{
    $connection->query("UPDATE products SET description = '$desc' WHERE id = {$_POST['product_id']}");
}
if ($_POST['qtty'] != '')
{
    $connection->query("UPDATE products SET quantity = $qtty WHERE id = {$_POST['product_id']}");
}
if ($_POST['price'] != '')
{
    $connection->query("UPDATE products SET price = $price WHERE id = {$_POST['product_id']}");
}

header("Location: ../item.php?item={$_POST['product_id']}");
exit();

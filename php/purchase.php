<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../cart.php");
    exit();
}

require_once 'database.php';

$result = $connection->query("SELECT * FROM carts WHERE user_id={$_SESSION['id']}");
$num_rows = $result->num_rows;

if($num_rows == 0)
{
    header("Location: ../cart.php");
    exit();
}

for($i = 0 ; $i < $num_rows ; ++$i)
{
    $row = $result->fetch_assoc();
    
    //$result2 = $connection->query("SELECT * FROM products WHERE id={$row['product_id']}");
    //$product = $result2->fetch_assoc();
    //$connection->query("UPDATE products SET quantity = quantity - {$row['qtty']} WHERE id = {$product['id']}");

    $connection->query("UPDATE products SET quantity = quantity - {$row['quantity']} WHERE id = {$row['product_id']}");
    
    $result2 = $connection->query("SELECT quantity FROM products WHERE id = {$row['product_id']}");
    $qtty = $result2->fetch_assoc();

    $connection->query("DELETE FROM carts WHERE product_id={$row['product_id']} and quantity > {$qtty['quantity']}");    
}

$connection->query("DELETE FROM carts WHERE user_id={$_SESSION['id']}");

header("Location: ../cart.php");
exit();
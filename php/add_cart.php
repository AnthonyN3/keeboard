<?php
session_start();

if ( !isset($_SESSION['id']) ) {
    $_SESSION['cart_error'] = 'Please Sign In';
    header("Location: ../item.php?item={$_POST['product_id']}");
    exit();
}

require_once 'database.php';

$result = $connection->query("SELECT * FROM carts WHERE user_id = {$_SESSION['id']} AND product_id =  {$_POST['product_id']}");
if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    $connection->query("UPDATE carts SET quantity = {$_POST['qtty']} WHERE id = {$row['id']}");
}
else
{
    $connection->query("INSERT INTO carts (`user_id`, `product_id`, `quantity`) VALUES ( {$_SESSION['id']} , {$_POST['product_id']} , {$_POST['qtty']} )");
}

$_SESSION['cart_added'] = 'Added To Cart';

header("Location: ../item.php?item={$_POST['product_id']}");
exit();
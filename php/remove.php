<?php
//for removing item from cart
session_start();
require_once 'database.php';

$connection->query("DELETE FROM carts WHERE id={$_POST['cart_id']}");

header("Location: ../cart.php");
exit();
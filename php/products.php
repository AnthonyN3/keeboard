<?php

require_once 'database.php';

$result = $connection->query("SELECT * FROM products WHERE 1");

$num_rows = $result->num_rows;

for ($i = 0 ; $i < $num_rows ; ++$i)
{
    $row = $result->fetch_assoc();
    if($row['category']==1)
    {
        $type = 'keyboard';
    } else if($row['category']==2){
        $type = 'macropad';
    } else if($row['category']==3){
        $type = 'deskpad';
    }
    
    echo "<div class=\"media all $type\"> 
           <a href=\"item.php?item={$row['id']}\"><img src=\"{$row['image']}\" alt=\"\" title=\"This right here is a caption.\" /></a> 
         </div>";
}
?>


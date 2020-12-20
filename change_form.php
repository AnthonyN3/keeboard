<div style="text-align: center;">
    <h1>Change Product Details:</h1>
    <form  method="POST" action="php/change_product.php">
        <label>Name</label>
        <input style="text-align: center;" type="text" name="pname" id="pname" maxlength="45">
        <br>

        <label>Description</label>
        <input style="text-align: center;" type="text" name="desc" id="desc" maxlength="280">
        <br>

        <label>Quantity</label>
        <input style="text-align: center;" type="number" name="qtty" id="qtty" min="0" max="100000000">
        <br><br>
        
        <label>Price:</label>
        <input style="text-align: center;" type="number" name="price" id="price" min="0" max="100000000">
        <br><br>
        <input type="hidden" name="product_id" id="product_id" value=<?php echo $row['id']; ?>>
        <input value="Apply Changes" type="submit"/>
    </form>
</div>

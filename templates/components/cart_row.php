<tr>
    <td class="cart_product">
        <a href="home?id=<?php echo $item['item_id'] ?>">
            <img  style="max-width: 80px" style="max-height: 80px" src="assets/images/products/<?php echo $item['img'] ?>" alt="itemImage">
        </a>
    </td>
    <td class="cart_description">
        <h4><a href="home?id=<?php echo $item['item_id'] ?>"><?php echo $item['name'] ?></a></h4>
        <p>Item ID: <?php echo $item['item_id'] ?></p>
    </td>
    <td class="cart_price">
        <p><?php echo $item['price'] ?> грн</p>
    </td>
    <td class="cart_quantity">
        <div class="cart_quantity_button">
            <a class="cart_quantity_up" href=""> + </a>
            <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $item['count'] ?>" autocomplete="off" size="2">
            <a class="cart_quantity_down" href=""> - </a>
        </div>
    </td>
    <td class="cart_total">
        <p class="cart_total_price"><?php echo $item['price']*$item['count'] ?> грн</p>
    </td>
    <td class="cart_delete">
        <a class="cart_quantity_delete" href="/cart/delete?item_id=<?php echo $item['item_id'] ?>"> х </a>
    </td>
</tr>
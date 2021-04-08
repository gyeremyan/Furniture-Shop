<?php include '../view/header2.php'; ?>

<main id="cart-view-container">

    <h1>Cart</h1>
    <?php if (cart_product_count() == 0) : ?>
        <p>There are no products in your cart.</p>
    <?php else: ?>
        <p class="delete-msg">To remove an item from your cart, change its quantity to 0.</p>
        <form action="." method="post" class="cart-form">
            <input type="hidden" name="action" value="update">
            <table id="cart" cellspacing="15">
            <tr id="cart_header">
                <th class="left">Item</th>
                <th class="right">Price</th>
                <th class="right">Quantity</th>
                <th class="right">Total</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                </td>
                <td class="right">
                    <input type="text" size="3" class="right"
                        name="items[<?php echo $product_id; ?>]"
                        value="<?php echo $item['quantity']; ?>">
                </td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer" >
                <td colspan="3" class="right" ><b>Subtotal</b></td>
                <td class="right subtotal">
                    <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="right btn-field">
                    <input class="btn" type="submit" value="Update Cart">
                    <!-- if cart has items, display the Checkout link -->
                    <?php if (cart_product_count() > 0) : ?>
                    <a class="checkout-btn" href="../checkout" >Checkout</a>
                    <?php endif; ?>
                </td>
            </tr>
            </table>
        </form>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>

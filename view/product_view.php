<?php include 'header.php'; ?>
<main>
    <section class="product-view">
        <h1><?php echo $name; ?></h1>

        <div class="product-container">
            
            <a id="prodview-img">
                <img src="<?php echo $image_filename; ?>"alt="<?php echo $image_alt; ?>" />
            </a>
            <div id="right_column">
                <p><b>List Price:</b> $<?php echo $list_price; ?></p>
                <p><b>Discount:</b> <?php echo $discount_percent; ?>%</p>
                <p><b>Your Price:</b> $<?php echo $unit_price_f; ?>
                    (You save $<?php echo $discount_amount_f; ?>)</p>
        
                <!--    ADD TO CART    -->
                <!-- action="." refers to index.php and will send the value="add" -->
                <form action="./cart" method="get" id="add_to_cart_form">
                    <input type="hidden" name="action" value="add" />
                    <input type="hidden" name="product_id"
                        value="<?php echo $product_id; ?>" />
                    <b>Quantity:</b>&nbsp;
                    <input type="text" name="quantity" value="1" size="2" />
                    <input class="btn" type="submit" value="Add to Cart" />
                </form>
               
               
               
            


            </div>
        </div> 
    </section>
</main>
<?php include 'footer.php'; ?>
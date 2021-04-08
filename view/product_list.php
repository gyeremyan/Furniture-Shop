<?php 
    //
    // PAGINATION 
    //
    global $db;

    $page = 1;
    if(!empty($_GET['page'])) {
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        if(false === $page) {
            $page = 1;
        }
    }
    // set the number of items to display per page
    $items_per_page = 8;
    // build query
    $offset = ($page - 1) * $items_per_page;
    
    // 
    //  SORTING
    // 
    $sort_by = filter_input(INPUT_POST, 'sort_by');

    if ($sort_by == 'name') {
        $query = "SELECT * FROM products
            WHERE products.categoryID = :category_id
            ORDER BY productName ASC 
            LIMIT " . $offset . "," . $items_per_page;
    } else if($sort_by == "price") {
        $query = "SELECT * FROM products
            WHERE products.categoryID = :category_id
            ORDER BY listPrice ASC 
            LIMIT " . $offset . "," . $items_per_page;
    } else {
        $query = "SELECT * FROM products
            WHERE products.categoryID = :category_id
            ORDER BY productID 
            LIMIT " . $offset . "," . $items_per_page;
    }

    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    //$prod_list replaces $products from index.php
    //in order for pagination to work
    $prod_list = $statement->fetchAll();
    $statement->closeCursor();
?>
<?php include 'header.php'; ?>
<main>
    <section class="product-list-section">
        <h1><?php echo $category_name; ?></h1>
        
        <!--    SORT FORM   -->
        <div class="sort-form">
            <form method="post">
                <select name="sort_by" id="sort">
                    <option value="" disabled selected hidden>Sort by</option>
                    <option name="sort_name" value="name">Name</option>
                    <option name="sort_price" value="price">Price</option>
                </select>
                <input class="btn sort-btn" type="submit" name="button" value="Submit"/>
            </form>
        </div>

        <ul class="product-list">
            <!-- display links for prod_list in selected category -->
            <?php foreach ($prod_list as $product) : ?>
            <li>  
                <a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>">
                    <img src="images/<?php echo $product['productCode'] ?>.png" alt="<?php echo $product['productCode'] ?>.png" id="prodlist-img"> 
                </a> 
                <strong>
                <a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>">
                    <?php echo $product['productName']; ?>
                </a>
                </strong>
                <p>
                    <?php echo $product['listPrice']; ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <!--    Pagination     -->
    <div class="pagination">
        <?php  
            $page_count = ceil(count($products) / $items_per_page);
            for ($i = 1; $i <= $page_count; $i++) {
                if ($i === $page) { // this is current page
                    echo "<strong class='page-active'>".$i."</strong>" . " ";
                } else { // show link to other page   
                    echo "<a href='index.php?category_id=".$category_id."&page=".$i."'>".$i."</a> ";
                }
            }
        ?>
    </div>
</main>
<?php include 'footer.php'; ?>


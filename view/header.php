<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Shop</title>
    <link href="/furniture_shop_cpp/main.css" rel="stylesheet" type="text/css">
</head>

<!-- the body section -->
<body>
<header class="header-container">
    <h1 class="shop-title">Furniture Shop</h1>
    <div class="cart-btn">
            <a href="./cart">View Cart</a>
    </div>
</header>
<aside class="nav-bar">
    <nav>
        <ul class="cat-list">
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>         
    </nav>
</aside>
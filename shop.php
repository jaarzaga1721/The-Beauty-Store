<?php
// simple product list
$products = [
    ["name" => "Blush On", "price" => 299, "img" => "img/blush.jpg"],
    ["name" => "Concealer", "price" => 399, "img" => "img/concealer.jpg"],
    ["name" => "Mascara", "price" => 249, "img" => "img/mascara.jpg"],
    ["name" => "Bronzer", "price" => 350, "img" => "img/bronzer.jpg"],
    ["name" => "Face Cleanser", "price" => 295, "img" => "img/cleanser.jpg"],
    ["name" => "Sunscreen", "price" => 200, "img" => "img/sunscreen.jpg"],
    ["name" => "Lipstick", "price" => 199, "img" => "img/lipstick.jpg"],
    ["name" => "Foundation", "price" => 499, "img" => "img/foundation.png"],
    ["name" => "Eyeliner", "price" => 250, "img" => "img/eyeliner.jpg"]
];

// list of best seller products
$best_sellers = ['Blush On', 'Concealer', 'Mascara', 'Bronzer'];


// if else statement - message if there are avail products or not
if (count($products) == 0) {
    $message = "No products available right now.";
} else {
    $message = "Browse our products below!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Beauty Store</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>


    <nav>
        <ul id="nav">
            <li><a href="The_Beauty_Store.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="offers.php">Offers</a></li>
            <li><a href="stock.php">Stocks</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <hr>

    <div class="main-content-wrapper"> 

        <h1>The Beauty Store</h1>

        <p><strong><?php echo $message; ?></strong></p>


        <?php 
        foreach ($products as $p): ?>

            <div class="product">

                <img src="<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>">

                <h3><?php echo $p['name']; ?></h3>
                <p>P<?php echo number_format($p['price'], 2); ?></p>

                <!-- if else statement- for the lable of products -->
                <?php
                if ($p['price'] > 350) {
                    echo "<p style='color:red;'>Premium Item!</p>";
                } elseif ($p['price'] >= 300) {
                    echo "<p style='color:green;'>Mid-range Item!</p>";
                } else {
                    echo "<p style='color:blue;'>Budget Friendly!</p>";
                }
                ?>
                
                <?php
                if (in_array($p['name'], $best_sellers)) {
                    echo "<p style='color:black; font-weight: bold;'>⭐ Official Best Seller!</p>";
                }
                ?>

                <button>Add to Cart</button>

            </div>

        <?php endforeach; ?> 
    </div>    
    <?php include 'footer.php';?>  

</body>
</html>

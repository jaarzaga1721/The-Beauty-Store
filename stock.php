<?php
// simple product list
$products = [
    "Blush On" => ["price" => 299, "stock" => 10],
    "Concealer" => ["price" => 399, "stock" => 5],
    "Mascara" => ["price" => 249, "stock" => 20],
    "Bronzer" => ["price" => 350, "stock" => 8],
    "Face Cleanser" => ["price" => 295, "stock" => 15],
    "Sunscreen" => ["price" => 200, "stock" => 12],
    "Lipstick" => ["price" => 199, "stock" => 30],
    "Foundation" => ["price" => 499, "stock" => 6],
    "Eyeliner" => ["price" => 250, "stock" => 14]
];

//variable to hold tax
$tax_rate = 12;

//a function that return a message whether or not an item should be reordered
function get_reorder_message(int $stock): string {
    return $stock < 10 ? "Yes" : "No";
}

//a fucntion that multiplies the price and the quantity of a product
function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}

//a function that multiplies  (price of one item multiplied by the available quantity) and (the tax rate divided by 100).
function get_tax_due(float $price, int $qty, int $tax_rate = 0): float {
    return ($price * $qty) * ($tax_rate / 100);
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
    <h2>Store Stock Monitoring</h2>

    <table>
        <tr>
            <th>Product Name</th>
            <th>Stock Level</th>
            <th>Reorder?</th>
            <th>Total Value (Php)</th>
            <th>Tax Due (Php)</th>
        </tr>

        <?php foreach ($products as $product_name => $data): ?>
            <tr>
                <td><?= $product_name ?></td>
                <td><?= $data["stock"] ?></td>
                <td><?= get_reorder_message($data["stock"]) ?></td>
                <td><?= number_format(get_total_value($data["price"], $data["stock"]), 2) ?></td>
                <td><?= number_format(get_tax_due($data["price"], $data["stock"], $tax_rate), 2) ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
        </div>        

        <?php include 'footer.php';?>


</body>
</html>

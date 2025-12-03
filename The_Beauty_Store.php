<?php

$items = 3;
$cost = 500;
$membership = "silver";

$subtotal = $cost * $items;
$tax = (($subtotal / 100) * 12);
$total = $subtotal + $tax;

$best_sellers = ['Blush', 'Concealer', 'Mascara', 'Bronzer'];

$tax_rate_str = "12";

$tax_juggle = ($subtotal / 100) * $tax_rate_str;
$is_discounted = ($total > 1500);

$discount_message = $is_discounted ? "You qualify for a discount!" : "No discount available.";

//switch statements
switch ($membership){
    case "platinum":
        $member_message = "Membership: Platinum - You get 20% off!";
        break;
    case "gold":
         $member_message = "Priority Customer: Early Access to Sales.";
        break;

    case "silver":
        if ($total >= 1000){
             $member_message = "Silver Boost: 10% discount applied";
        } else {
             $member_message = "Membership: Silver - Keep shopping to unlock higher level";
        }
        break;    

    default:
         $member_message = "Standard Customer: Sign up to earn membership benefits.";
         break;
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

        <h2>Best Sellers</h2>
        <ul>
            <?php foreach ($best_sellers as $item): ?>
                <li><?php echo $item; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Shopping Cart</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ITEMS</th>
                    <th>COST PER ITEM</th>
                    <th>SUBTOTAL</th>
                    <th>TAX (12%)</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $items; ?></td>
                    <td>₱<?php echo number_format($cost, 2); ?></td>
                    <td>₱<?php echo number_format($subtotal, 2); ?></td>
                    <td>₱<?php echo number_format($tax, 2); ?></td>
                    <td><strong>₱<?php echo number_format($total, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <h3>THANK YOU FOR BUYING!</h3>
        <h3>Customer Info</h3>

        <p class="offer">
            <strong><?php echo $discount_message; ?></strong>
            <strong><?php echo $member_message; ?></strong>

        </p>

        
        
    </div> 
    <?php include 'footer.php';?>  

</body>
</html>
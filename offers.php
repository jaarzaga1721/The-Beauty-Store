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
        $member_discount_rate = "20%";
        $member_message = "Membership: Platinum - You get 20% off all purchases!";
        $offers_list = ["20% off all items", "Free shipping on all orders", "Early access to new collections."];
        break;
    case "gold":
        $member_discount_rate = "15%";
        $member_message = "Priority Customer: You receive 15% off all items and early access to sales.";
        $offers_list = ["15% off all items", "Flat rate shipping", "Invitations to exclusive events."];
        break;

    case "silver":
    default: 
        $member_discount_rate = "10%";
        if ($total >= 1000){
            $member_message = "Silver Boost: 10% discount applied to your current order!";
        } else {
            $member_message = "Membership: Silver - Unlock 10% off by spending ₱1,000 or more.";
        }    
        $offers_list = ["Unlock 10% off purchases over ₱1,000", "Monthly free sample", "Birthday reward."];
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
        <h2>Current Offers and Discounts</h2>

    <div class="offer-status">
        <h2>Your Status: <strong style= "color: #993344;"><?php echo ucfirst($membership); ?> Member</strong></h2>
        <p class="offer">
            <?php echo $member_message; ?>
        </p>

        <p class="offer-summary">
            <?php if ($is_discounted): ?>
                <span style="color: green; font-weight: bold;"><?php echo $discount_message; ?></span>
            <?php else: ?>
                <span style="color: #993344;"><?php echo $discount_message; ?></span>
            <?php endif; ?>
            <br>
            Current Total: ₱<?php echo number_format($total, 2); ?>
        </p>
    </div>

    <hr style="margin: 40px auto; border-color: #f7e6e5;">

        <table border="1">
            <thead>
                <tr>
                    <th><h2 style="color: #ffffff;"><?php echo ucfirst($membership); ?> Member Exclusive Benefits</h2></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php foreach ($offers_list as $offer): ?>
                <li><?php echo $offer; ?></li>
            <?php endforeach; ?></td>
                  
            </tbody>
        </table>

        <?php if ($membership !== 'platinum'): ?>
            <p style="margin-top: 30px; font-size: 1.1em; color: #993344;">
                Want more rewards? Upgrade to Platinum by spending a total of ₱5,000!
            </p>
        <?php endif; ?>
        
    </div>
</div>
 <?php include 'footer.php';?> 
</body>
</html>
<?php
/**
 * B00084376
 * This is the shopping cart for Dublin Music.
 * This will display the names of the items, prices, information and allow the user to select location of store to buy the item and the quantity.
 */

include_once("config.php");
include "base.php";
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$title="Shopping Cart";
$title2 = "Login";
$linkAddress1 = "../public/images/7 27 Fifth Harmony.jpg";
$linkAddress2 = "../public/images/Unbreakable Janet Jackson.jpg";

/*
 * This code was originally used to change the header to say Login whenever a user was not logged in, then Logout whenever a user was logged in.
 *
if (!empty($_SESSION['Username']))
{
    $title2 = "Logout";
}

else
{
    $title2 = "Login";
}
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo $title; ?></title>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript">
        function clearText(field)
        {
            if (field.defaultValue == field.value)
                field.value = '';
            else if (field.value == '')
                field.value = field.defaultValue;
        }
    </script></head>
<body>
<div id="templatemo_container_wrapper">
    <div id="templatemo_container">

        <div id="templatemo_banner">

            <div id="site_title">
                <h1><a href="#">Dublin Music</a></h1>
                <h1><a href="#"><small><?php echo $title; ?></small></a></h1>
            </div>

            <div id="templatemo_menu">
                <ul>
                    <li><a href="index.php" class="current">Home</a></li>
                    <li><a href="cdsForSale.php">CD's</a></li>
                    <li><a href="instrumentsForSale.php">Instruments</a></li>
                    <li><a href="shoppingCart.php">Shopping Cart</a></li>
                    <li><a href="loginScreen.php"><?php echo $title2; ?></a></li>
                </ul>
            </div>

        </div>

        <div id="templatemo_content">
            <div id="side_column">
                <div class="side_column_box">
                    <h2><span></span>New Releases</h2>
                    <div class="side_column_box_content">
                        <div class="news_section">
                            <div style="text-align: center;"><a href="#"><img style="width: 154px; height: 129px;" src="<?php echo $linkAddress1; ?>"/></a></div><a href="#">
                            </a>
                            <p style="text-align: center; color: yellow;">7 27</p><p style="text-align: center;">Fifth Harmony</p>
                        </div>

                        <div class="news_section">
                            <div style="text-align: center;"><a href="#"><img style="width: 154px; height: 129px;" src="<?php echo $linkAddress2; ?>"/></a></div><a href="#">
                            </a>
                            <p style="text-align: center; color: yellow;">Unbreakable</p><p style="text-align: center;">Janet Jackson</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main_column">
            <div class="main_column_section">
                <h2><span></span>Your Shopping Cart (Discount of 20% if logged in!)<br />
                </h2>
                <div class="main_column_section_content">
                    <h4>
                    <?php

                    if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
                    {
                        echo '<div class="cart-view-table-front" id="view-cart">';
                        echo '<form method="post" action="cart_update.php">';
                        echo '<table width="100%"  cellpadding="6" cellspacing="0">';
                        echo '<tbody>';

                        $total =0;
                        $b = 0;
                        foreach ($_SESSION["cart_products"] as $cart_itm)  //This will show all of the  cart item
                        $product_name = $cart_itm["product_name"];
                        $product_qty = $cart_itm["product_qty"];
                        $product_price = $cart_itm["product_price"];
                        $product_code = $cart_itm["product_code"];
                        $product_storeLocation = $cart_itm["product_storeLocation"];
                        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
                        echo '<tr class="'.$bg_color.'">';
                        echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
                        echo '<td>'.$product_name.'</td>';
                        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
                        echo '</tr>';
                        $subtotal = (($product_price - $discount) * $product_qty);
                        $total = ($total + $subtotal);
                        echo '<td colspan="4">';
                        echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
                        echo '</td>';
                        echo '</tbody>';
                        echo '</table>';

                        $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                        echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
                        echo '</form>';
                        echo '</div>';

                    }
                    ?>
                    <!-- View Cart Box End -->


                    <!-- Products List Start -->
                    <?php
                    $results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");

                    if($results)
                    {
                        $products_item = '<ul class="products">';

                        while($obj = $results->fetch_object()) //This creates a loop that will obtain each items image, name, price and information.
                        {
                            $products_item .= <<<EOT
                        
                        <li class="product">
                        <form method="post" action="cart_update.php">
                        <div class="product-content"><h3>{$obj->product_name}</h3>
                        <center><img style="width: 154px; height: 129px;" src="../public/images/{$obj->product_img_name}"></center>
                        <div class="product-desc">{$obj->product_desc}</div>
                        <div class="product-info">
                        Price {$currency}{$obj->price}
                        
                        <fieldset>
                        
                        <label>
                            <span>Store Location</span>
                            <select name="product_storeLocation">
                            <option value="Blanchardstown">Blanchardstown</option>
                            <option value="Killester">Killester</option>
                            <option value="Jervis Centre">Jervis Centre</option>
                            <option value="Stephens Green">Stephens Green</option>
                            </select>
                        </label>
                        
                        <label>
                            <span>Quantity</span>
                            <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
                        </label>
                        
                        </fieldset>
                        <input type="hidden" name="product_code" value="{$obj->product_code}" />
                        <input type="hidden" name="type" value="add" />
                        <input type="hidden" name="return_url" value="{$current_url}" />
                        <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
                        </div></div>
                        </form>
                        </li>
EOT;
                        }
                        $products_item .= '</ul>';
                        echo $products_item;
                    }
                    ?>
                        </h4>
                </div>
                <div class="cleaner"></div>
                <div class="bottom"></div>
            </div>
            <div class="main_column_section">
                <h2><span></span>Information</h2>
                <div class="main_column_section_content">
                    <h5>If you add an item to your cart it will appear at the top of the page. Scroll up and click add to begin!<br /></h5>
                </div>
                <div class="bottom"></div>
            </div>
            <div class="cleaner"></div>
        </div>
        <div style="text-align: center;" id="templatemo_footer" align="center">
            <div id="templatemo_footer_bar">
                <ul class="footer_menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cdsForSale.php">CD's</a></li>
                    <li><a href="instrumentsForSale.php">Instruments's</a></li>
                    <li><a href="shoppingCart.php">Shopping Cart</a></li>
                    <li><a href="loginScreen.php">Login</a></li>
                </ul>
                Copyright © 2016 <a href="index.php">Dublin Music's <?php echo $title; ?> Page</a>
            </div>
        </div>
    </div>
</div>
</body></html>
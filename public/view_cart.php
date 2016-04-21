<?php
/**
 * B00084376
 * This page will show the current cart to the user.
 *
 */
include "base.php";
include_once("config.php");
$title="View Cart";
$title2 = "Login";
$linkAddress1 = "../public/images/7 27 Fifth Harmony.jpg";
$linkAddress2 = "../public/images/Unbreakable Janet Jackson.jpg";

if (!empty($_SESSION['Username']))
{
	$title2 = "Logout";
}

else
{
	$title2 = "Login";
}
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
				<h1><a href="#"><small><?php echo $title; ?></a></h1>
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
				<h2><span></span>About this site<br />
				</h2>
				<div class="main_column_section_content"><big> </big>
					<h5><form method="post" action="cart_update.php">
							<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
								<tbody>
								<?php
								if(isset($_SESSION["cart_products"])) //Checks session variables.
								{
									$total = 0;
									$b = 0;

									foreach ($_SESSION["cart_products"] as $cart_itm)
									{
										//Set variables to use
										$product_name = $cart_itm["product_name"];
										$product_qty = $cart_itm["product_qty"];
										$product_price = $cart_itm["product_price"];
										$product_code = $cart_itm["product_code"];
										$product_storeLocation = $cart_itm["product_storeLocation"];
										$subtotal = ($product_price * $product_qty); //Calculate total, price x quantity.

										$bg_color = ($b++%2==1) ? 'odd' : 'even'; //Class for zebra stripe (used for the box the cart is displayed in).
										echo '<tr class="'.$bg_color.'">';
										echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
										echo '<td>'.$product_name.'</td>';
										echo '<td>'.$currency.$product_price.'</td>';
										echo '<td>'.$currency.$subtotal.'</td>';
										echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
										echo '</tr>';
										$total = ($total + $subtotal);
									}

									$grand_total = $total + $shipping_cost;

									foreach($taxes as $key => $value) //List and calculate all taxes
									{
										$tax_amount     = round($total * ($value / 100));
										$tax_item[$key] = $tax_amount;
										$grand_total    = $grand_total + $tax_amount;
									}

									$list_tax = '';

									foreach($tax_item as $key => $value) //List all taxes
									{
										$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
									}
									$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
								}
								?>
								<tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
								<tr><td colspan="5"><h6><button type="submit"><a href="../public/shoppingCart.php" class="button">Add More Items      </a></button><button type="submit">Update</button>
								<button type="submit"><a href="../public/purchaseComplete.php" class="button">    Complete purchase</a></button></td></tr></h3>
								</tbody>
							</table>
							<input type="hidden" name="return_url" value="<?php
							$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
							echo $current_url; ?>" />
						</form></h5>
				</div>
				<div class="cleaner"></div>
				<div class="bottom"></div>
			</div>
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
				Copyright © 2016 <a href="index.php#">Dublin Music's <?php echo $title; ?> Page</a>
			</div>
		</div>
	</div>
</div>
</body></html>
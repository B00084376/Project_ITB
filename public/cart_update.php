<?php
/**
 * B00084376
 * This page is used to update the cart and show the products the customer has added to the cart.
 */

session_start();
include_once("config.php");

//Add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
	foreach($_POST as $key => $value)  //Add all post vars to new_product array
	{
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//Remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 
	
 	//This will get the product name and price from the database.
    $statement = $mysqli->prepare("SELECT product_name, price FROM products WHERE product_code=? LIMIT 1");
    $statement->bind_param('s', $new_product['product_code']);
    $statement->execute();
    $statement->bind_result($product_name, $price);
	
	while($statement->fetch())
	{
		//This will retrieve the product name and price from the database and add to new_product array.
        $new_product["product_name"] = $product_name; 
        $new_product["product_price"] = $price;
        
        if(isset($_SESSION["cart_products"]))  //If session exists
		{
            if(isset($_SESSION["cart_products"][$new_product['product_code']])) //Check item exists in the products array.
            {
                unset($_SESSION["cart_products"][$new_product['product_code']]); //Unset the old array item.
            }           
        }
        $_SESSION["cart_products"][$new_product['product_code']] = $new_product; //Update/create product session with new item
    } 
}


//This will update or remove items.
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
	//Update item quantity in product session
	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"]))
	{
		foreach($_POST["product_qty"] as $key => $value)
		{
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["product_qty"] = $value;
			}
		}
	}
	//Remove an item from product session, this is done when an item is removed from the cart.
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"]))
	{
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //Return url
header('Location:'.$return_url);

?>
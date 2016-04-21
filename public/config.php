<?php
/**
 * B00084376
 * This is the site for setting the various prices in the shopping cart once the user goes the check out.
 */

$currency = '€';
$db_username = 'root';
$db_password = 'YES';
$db_name = 'test';
$db_host = 'localhost';

//If the user is logged in then a discount will be given.
if (!empty($_SESSION['Username']))
{
    $discount = -20;
}

else
{
    $discount = 0;
}

$shipping_cost      = 1.50;
$taxes              = array( //Taxes (measured in percent).
                            'VAT' => 12, 
                            'Service Tax' => 5,
                            'Discount' => $discount
                            );						
//Connect to MySql.
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error)
{
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
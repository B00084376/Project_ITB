<?php
//B00084376
//This php file is used when a user completes a purchase.
//The session will end logging out the user and completing the purchase.

use DublinMusic\MainController;
include "base.php";
$_SESSION = array();
session_destroy();
require_once __DIR__ . '/../app/setup.php';
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$mainController = new MainController();

if ('cds' == $action)
{
	$mainController->cdAction($twig);
}

else if ('index' == $action)
{
	$mainController->indexAction($twig);
}

else if ('instruments' == $action)
{
	$mainController->instrumentsAction($twig);
}

else
{
	$mainController->purchasedAction($twig);
}

?>





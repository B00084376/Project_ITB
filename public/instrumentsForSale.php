<?php
/*
 * B00084376
 * This is the site for viewing the information on the instruments.
 */
use DublinMusic\MainController;
include "base.php";
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

else
{
    $mainController->instrumentsAction($twig);
}

?>
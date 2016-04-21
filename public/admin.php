<?php
/*
 * B00084376
 * This page is used only when the admin logs in.
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

else if ('instruments' == $action)
{
    $mainController->instrumentsAction($twig);
}

else
{
    $mainController->adminAction($twig);
}

?>





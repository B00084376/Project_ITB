<?php
/**
 * B00084376
 * This is the main part of the site, this is the first page the person will see.
 * By using the MainController this class refers to the twig file and obtains its template from there.
 */
use DublinMusic\MainController;
include "base.php";
include_once("config.php");
require_once __DIR__ . '/../app/setup.php';
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$mainController = new MainController();

if ('cds' == $action)
{
        $mainController->cdAction($twig);
}

else if ('instruments' == $action)
{
        $mainController->instrumentsAction($twig);
}

else
{
        $mainController->indexAction($twig);
}

?>
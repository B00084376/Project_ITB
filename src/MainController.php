<?php

/*
 * B00084376
 * This is the MainController.
 * This will redirect the php files to the corresponding twig files.
 * This is done by creating an array, then crating a variable for the name of the site.
 * Finally the name is printed followed by '.html.twig' which will initiate the page to render.
 */

namespace DublinMusic;

class MainController
{
    public function adminAction($twig)
    {
        $argsArray = [];
        $templateName = 'admin';
        print $twig->render($templateName . '.html.twig', $argsArray);
    }

    public function indexAction($twig)
    {
        $argsArray = [];
        $templateName = 'index';
        print $twig->render($templateName . '.html.twig', $argsArray);
    }

    public function cdAction($twig)
    {
        $argsArray = [];
        $templateName = 'cdsForSale';
        print $twig->render($templateName . '.html.twig', $argsArray);
    }

    public function purchasedAction($twig)
    {
        $argsArray = [];
        $templateName = 'purchaseComplete';
        print $twig->render($templateName . '.html.twig', $argsArray);
    }

    public function instrumentsAction($twig)
    {
        $argsArray = [];
        $templateName = 'instrumentsForSale';
        print $twig->render($templateName . '.html.twig', $argsArray);
    }

}
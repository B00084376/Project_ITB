<?php
/*
 * B00084376
 * This page is used for the database.
 * This logs in using the username root and password yes, allowing it to create a database in MyPhpAdmin.
 * The database I use for the users is called "users".
 */

session_start();

$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "users"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = "YES"; // the password that you created, or were given, to access your database

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>
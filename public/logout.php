<?php
/**
 * B00084376
 * This is the logout page, when a user clicks logout this will end the session.
 */

include "base.php";
$_SESSION = array();
session_destroy();
?>
<meta http-equiv="refresh" content="0;loginScreen.php">
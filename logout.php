<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/29/2018
 * Time: 12:59 AM
 */


/* Log out process, unsets and destroys session variables */
if (session_status() == PHP_SESSION_NONE) {    session_start();}
session_unset();
session_destroy();


header("Location:index.php");

?>
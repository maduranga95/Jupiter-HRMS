<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/21/2018
 * Time: 9:05 PM
 */
/* Database connection settings */
require 'config.php';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'hr_db';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

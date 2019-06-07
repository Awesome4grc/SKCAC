<?php
/**
 * Created by PhpStorm.
 * User: A-VE
 * Date: 5/24/2019
 * Time: 12:32 PM
 */
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

$_SESSION[$_POST['id']] = $_POST['value'];

//echo "Session ". $_SESSION[$_POST['id']];
<?php
/**
 * Created by PhpStorm.
 * User: A-VE
 * Date: 6/12/2019
 * Time: 2:09 PM
 */
session_start();
$medications = array();
$frequencies = array();
$times = array();

for ($i = 0; $i < sizeOf($_POST['meds']); $i++){
    $medications[] = $_POST['meds'][$i];
    $freqs[] = $_POST['freqs'][$i];
    $times[] = $_POST['times'][$i];
}
$_SESSION['medications'] = $medications;
$_SESSION['frequencies'] = $frequencies;
$_SESSION['times'] = $times;


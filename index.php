<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once('vendor/autoload.php');

//require_once ('model/db-functions.php');
require_once('model/validate.php');

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);
session_start();

// creates a database object
$db = new Database();

//define a default route
$f3->route('GET /', function() {
    $_SESSION = array();
    $view = new Template();
    echo $view->render('views2/home.html');
});

$f3->route('GET /admin', function($f3) {
    global $db;
    $result = $db->getParticipants();
    $f3->set('resultGetParticipants', $result);
    $_SESSION['resultGetParticipants'] = $result;
    $view = new Template();
    echo $view->render('views2/admin.html');
});

//define a default route
$f3->route('GET|POST /forms', function($f3) {

    $view = new Template();
    echo $view->render('views2/forms.html');
});

// defines a route for the confirmation page
$f3->route('GET|POST /confirmation', function($f3) {
    // do something here...



    $view = new Template();
    echo $view->render('views2/confirmation.html');
});

$f3->route('GET /thank_you', function() {
    $view = new Template();
    echo $view->render('views2/thank_you.html');
    // resets session, clears everything
    $_SESSION = array();
});

//run fat free framework
$f3->run();
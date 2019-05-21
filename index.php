<!--

Author: Awesome Four (Adolfo, Alec, Bo, Keith)
Date:   4/25/2019
File: index.php

-->
<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once('vendor/autoload.php');

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET|POST /', function(){

    $view = new Template();
    echo $view->render('views/forms.html');
});



//run fat free framework
$f3->run();
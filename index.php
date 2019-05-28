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
require_once ('model/db-functions.php');

//Connect to the database
$dbh = connect();
if(!$dbh){
    exit;
}

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET|POST /', function(){

    //$participant_id = getParticipantID("Keith","Carlson");

    //$success = addParticipant("Keith","Carlson","1121 Elm ST","Auburn","WA",98042,"(206)867-5309)","kcarlson@school.com");
    //$success = updateParticipant(0,"123 Easy ST", "Kent","WA", 98042, "(206)555-4321","kcarlson@school.com");
    //$success = addEmergencyContact($participant_id,"Janina","Georgiu","(206)555-1111");
    //$success = updateEmergencyContact($participant_id,"Janina","Georgiu","(206)555-1111");
    //$success = addGuardian($participant_id,"Iron","Man","10880 Malibu Point","Malibu","CA",90210, "(000)000-0001","tstark@avenger.com");
    //$success = updateGuardian($participant_id,"Iron","Man","10880 Malibu Point","Malibu","CA",90210, "(000)000-0001","tstark@avenger.com");
    //$success = addMedication($participant_id,"Aleve","Weekly","Morning");
    //$success = containsMedication($participant_id,"Aleve");
    //$success = updateMedFrequency($participant_id,"Aleve","Daily");
    //$success = updateMedTimeTaken($participant_id,"Aleve","Evening");
    //$success = addAlertsLimitsDiet($participant_id,"","upside down","Lactose intolerant");
    //$success = updateMedAlerts($participant_id,"hates work");
    //$success = updatePhysicalLimits($participant_id,"standing forever");
    //$success = updateDietRestrictions($participant_id,"spicy food");
    //$success = addProvider($participant_id,"NSA","123 Street ST","Gotham", "NY", 54321,"(206)555-4444","nsa@watchingyou.com");
    //$success = updateProvider($participant_id,"NSA","123 Street ST","New York", "NY", 54321,"(206)555-1101","nsa@watchingyou.com");
    /*
    if($success){
        echo "Keith updated";
    }
    else{
        echo "Keith not updated";
    }
    */


    $view = new Template();
    echo $view->render('views/forms.html');
});



//run fat free framework
$f3->run();
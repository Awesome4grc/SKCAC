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

//define a default route
$f3->route('GET /', function() {

    $_SESSION = array();

    $view = new Template();
    echo $view->render('views2/forms_and_admin.html');
});

$f3->route('GET /admin', function($f3) {
    global $db;
    $result = $db->getParticipants();

    $f3->set('resultGetParticipants', $result);
    $_SESSION['resultGetParticipants'] = $result;

    $view = new Template();
    echo $view->render('views2/admin.html');
});

$f3->route('GET|POST /newForms', function() {
    $view = new Template();
    echo $view->render('views2/forms.html');
});

$f3->route('GET|POST /oldForms', function() {
    $view = new Template();
    echo $view->render('views/forms.html');
});

//define a default route
$f3->route('GET|POST /forms', function($f3) {

    global $db;


    // if the form has been submitted (via POST), validates it
    //if (!empty($_POST)) {

        /*
        // gets all the data from the participant info form
        $participantFirstName = $_POST['participantFirstName'];
        $participantLastName = $_POST['participantLastName'];
        $participantEmail = $_POST['participantEmail'];
        $participantPhone = $_POST['participantPhone'];
        $participantAddress = $_POST['participantAddress'];
        $participantAddress2 = $_POST['participantAddress2'];
        $participantCity = $_POST['participantCity'];
        $participantState = $_POST['participantState'];
        $participantZip = $_POST['participantZip'];
        */

        /*
        // stores all the data to hive for the purposes of sticky form and data validation
        $f3->set('participantFirstName', $participantFirstName);
        $f3->set('participantLastName', $participantLastName);
        $f3->set('participantEmail', $participantEmail);
        $f3->set('participantPhone', $participantPhone);
        $f3->set('participantAddress', $participantAddress);
        $f3->set('participantAddress2', $participantAddress2);
        $f3->set('participantCity', $participantCity);
        $f3->set('participantState', $participantState);
        $f3->set('participantZip', $participantZip);
        */

        /*
        $_SESSION['participantFirstName'] = $participantFirstName; // required
        $_SESSION['participantLastName'] = $participantLastName; // required
        $_SESSION['participantEmail'] = $participantEmail; // optional
        $_SESSION['participantPhone'] = $participantPhone; // optional
        $_SESSION['participantAddress'] = $participantAddress; // optional
        $_SESSION['participantAddress2'] = $participantAddress2; // optional
        $_SESSION['participantCity'] = $participantCity; // optional
        $_SESSION['participantState'] = $participantState; // optional
        $_SESSION['participantZip'] = $participantZip; // optional
        */

        //$f3->reroute('confirmation');
    //}

    /*
    if (!empty($_POST['provider-form'])) {

        $providerFirstName = $_POST['providerFirstName'];
        $providerLastName = $_POST['providerLastName'];
        $providerEmail = $_POST['providerEmail'];
        $providerPhone = $_POST['providerPhone'];
        $providerAddress = $_POST['providerAddress'];
        $providerAddress2 = $_POST['providerAddress2'];
        $providerCity = $_POST['providerCity'];
        $providerState = $_POST['providerState'];
        $providerZip = $_POST['providerZip'];


        // stores all the data to hive for the purposes of sticky form and data validation
        $f3->set('participantFirstName', $participantFirstName);
        $f3->set('participantLastName', $participantLastName);
        $f3->set('participantEmail', $participantEmail);
        $f3->set('participantPhone', $participantPhone);
        $f3->set('participantAddress', $participantAddress);
        $f3->set('participantAddress2', $participantAddress2);
        $f3->set('participantCity', $participantCity);
        $f3->set('participantState', $participantState);
        $f3->set('participantZip', $participantZip);


        $_SESSION['providerFirstName'] = $providerFirstName; // required
        $_SESSION['providerLastName'] = $providerLastName; // required
        $_SESSION['providerEmail'] = $providerEmail; // optional
        $_SESSION['providerPhone'] = $providerPhone; // optional
        $_SESSION['providerAddress'] = $providerAddress; // optional
        $_SESSION['providerAddress2'] = $providerAddress2; // optional
        $_SESSION['providerCity'] = $providerCity; // optional
        $_SESSION['providerState'] = $providerState; // optional
        $_SESSION['providerZip'] = $providerZip; // optional


        //$f3->reroute('confirmation');
    }
    */



        /*
        if (validateParticipantInfoForm()) {
            // stores data in session
            $_SESSION['participantFirstName'] = $participantFirstName; // required
            $_SESSION['participantLastName'] = $participantLastName; // required
            $_SESSION['participantEmail'] = $participantEmail; // optional
            $_SESSION['participantPhone'] = $participantPhone; // optional
            $_SESSION['participantAddress'] = $participantAddress; // optional
            $_SESSION['participantAddress2'] = $participantAddress2; // optional
            $_SESSION['participantCity'] = $participantCity; // optional
            $_SESSION['participantState'] = $participantState; // optional
            $_SESSION['participantZip'] = $participantZip; // optional

            // sends email notification to recipient(s)
            $recipient = "bbx719@hotmail.com";
            $subject = "$participantFirstName Just Updated Participant Information";
            //$sender = $_POST["name"];
            //$senderEmail = "sender@email.address";
            //$name = $_POST["name"];
            //$message = $_POST["message"];
            $emailBody = "Participant First Name: $participantFirstName\n".
                "Participant Last Name: $participantLastName\n".
                "E-mail: $participantEmail\n".
                "Phone: $participantPhone\n".
                "Address: $participantAddress\n".
                "Address2: $participantAddress2\n".
                "City: $participantCity\n".
                "State: $participantState\n".
                "Zip: $participantZip\n";

            mail($recipient, $subject, $emailBody, "From: SKCAC@example.com");

            // creates a participant object
            $participant = new Participant($participantFirstName, $participantLastName, $participantEmail, $participantPhone, $participantAddress, $participantAddress2, $participantCity, $participantState, $participantZip);


            $db->insertParticipant($participant);


            // reroute if all data are valid
            $f3->reroute('confirmation');
        }*/


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
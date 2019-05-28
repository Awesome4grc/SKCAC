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
//require_once ('model/db-functions.php');

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

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
    // if the form has been submitted (via POST), validates it
    if (!empty($_POST)) {
        // gets all the data from the personal info form
        $pFName = $_POST['participantFirstName'];
        $pLName = $_POST['participantLastName'];
        $pEmail = $_POST['participantEmail'];
        $pPhone = $_POST['participantPhone'];
        $pAddress = $_POST['participantAddress'];
        $pAddress2 = $_POST['participantAddress2'];
        $pCity = $_POST['participantCity'];
        $pState = $_POST['participantState'];
        $pZip = $_POST['participantZip'];

        // stores all the data to hive for the purposes of sticky form and data validation
        $f3->set('pFName', $pFName);
        $f3->set('pLName', $pLName);
        $f3->set('pEmail', $pEmail);
        $f3->set('pPhone', $pPhone);
        $f3->set('pAddress', $pAddress);
        $f3->set('pAddress2', $pAddress2);
        $f3->set('pCity', $pCity);
        $f3->set('pState', $pState);
        $f3->set('pZip', $pZip);

        if (validateParticipantInformationForm()) {
            // stores data in session
            $_SESSION['pFName'] = $pFName; // required
            $_SESSION['pLName'] = $pLName; // required

            $_SESSION['pEmail'] = $pEmail; // optional
            $_SESSION['pPhone'] = $pPhone; // optional
            $_SESSION['pAddress'] = $pAddress; // optional
            $_SESSION['pAddress'] = $pAddress2; // optional
            $_SESSION['pCity'] = $pCity; // optional
            $_SESSION['pState'] = $pState; // optional
            $_SESSION['pZip'] = $pZip; // optional

            // sends email notification to recipient(s)
            $recipient = "bbx719@hotmail.com";
            $subject = "$pFName Just Updated Participant Information";
            //$sender = $_POST["name"];
            $senderEmail = "sender@email.address";
            //$name = $_POST["name"];
            //$message = $_POST["message"];
            $emailBody = "Participant First Name: $pFName\n".
                "Participant Last Name: $pLName\n".
                "E-mail: $pEmail\n".
                "Phone: $pPhone\n".
                "Address: $pAddress\n".
                "Address2: $pAddress2\n".
                "City: $pCity\n".
                "State: $pState\n".
                "Zip: $pZip\n";

            mail($recipient, $subject, $emailBody, "From: SKCAC@example.com");

            // creates a participant object
            $participant = new Participant($pFName, $pLName, $pEmail, $pPhone, $pAddress, $pAddress2, $pCity, $pState, $pZip);

            global $db;
            $db->insertParticipant($participant);


            // reroute if all data are valid
            $f3->reroute('/thank_you');
        }
    }

    $view = new Template();
    echo $view->render('views2/forms.html');
});

$f3->route('GET /thank_you', function() {

    $view = new Template();
    echo $view->render('views2/thank_you.html');

    // resets session, clears everything
    $_SESSION = array();
});

//run fat free framework
$f3->run();
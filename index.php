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
    echo $view->render('views2/landing.html');
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
$f3->route('GET|POST /forms', function() {

    $view = new Template();
    echo $view->render('views2/forms.html');
});
// defines a route for the confirmation page
$f3->route('GET|POST /confirmation', function($f3) {




    // do something here...


    /* EMAIL NOTIFICATION in progress by Bo, do not delete */
    // 1st tab
    // participant
    $clientFirst = $_SESSION['clientFirst']; // required
    $clientLast = $_SESSION['clientLast']; // required
    $clientEmail = $_SESSION['clientEmail']; // optional
    $clientPhone = $_SESSION['clientPhone']; // optional
    $clientAddress = $_SESSION['clientAddress']; // optional
    $clientAddress2 = $_SESSION['clientAddress2']; // optional
    $clientCity = $_SESSION['clientCity']; // optional
    $clientState = $_SESSION['clientState']; // optional
    $clientZip = $_SESSION['clientZip']; // optional

    // residential provider
    $providerFirst = $_SESSION['providerFirst']; // required
    $providerLast = $_SESSION['providerLast']; // required
    $providerEmail = $_SESSION['providerEmail']; // optional
    $providerPhone = $_SESSION['providerPhone']; // optional
    $providerAddress = $_SESSION['providerAddress']; // optional
    $providerAddress2 = $_SESSION['providerAddress2']; // optional
    $providerCity = $_SESSION['providerCity']; // optional
    $providerState = $_SESSION['providerState']; // optional
    $providerZip = $_SESSION['providerZip']; // optional

    // guardian
    $guardFirst = $_SESSION['guardFirst']; // required
    $guardLast = $_SESSION['guardLast']; // required
    $guardEmail = $_SESSION['guardEmail']; // optional
    $guardPhone = $_SESSION['guardPhone']; // optional
    $guardAddress = $_SESSION['guardAddress']; // optional
    $guardAddress2 = $_SESSION['guardAddress2']; // optional
    $guardCity = $_SESSION['guardCity']; // optional
    $guardState = $_SESSION['guardState']; // optional
    $guardZip = $_SESSION['guardZip']; // optional

    // NSA
    $nsaFirst = $_SESSION['nsaFirst']; // required
    $nsaLast = $_SESSION['nsaLast']; // required
    $nsaEmail = $_SESSION['nsaEmail']; // optional
    $nsaPhone = $_SESSION['nsaPhone']; // optional
    $nsaAddress = $_SESSION['nsaAddress']; // optional
    $nsaAddress2 = $_SESSION['nsaAddress2']; // optional
    $nsaCity = $_SESSION['nsaCity']; // optional
    $nsaState = $_SESSION['nsaState']; // optional
    $nsaZip = $_SESSION['nsaZip']; // optional

    // emergency contact
    $emergFirst = $_SESSION['emergFirst']; // required
    $emergLast = $_SESSION['emergLast']; // required
    $emergPhone = $_SESSION['emergPhone']; // optional
    $emergAltPhone = $_SESSION['emergAltPhone']; // optional

    // medication

    // alerts, restrictions, limitations

    // notice of rights

    // release of info

    // photo release

    // appeal

    // medication and medicaid

    // 2nd tab
    // notice of rights
    $participantSig = $_SESSION['participantSig']; // required
    $guardianSig = $_SESSION['guardianSig']; // required




    // sends email notification to recipient(s)
    $recipient = "bzhang967@yahoo.com";
    $subject = "$clientFirst Just Updated Participant Information";
    //$sender = $_POST["name"];
    $senderEmail = "sender@email.address";
    //$name = $_POST["name"];
    //$message = $_POST["message"];
    $emailBody = "Participant Info:\n".
        "First Name: $clientFirst\n".
        "Last Name: $clientLast\n".
        "E-mail: $clientEmail\n".
        "Phone: $clientPhone\n".
        "Address: $clientAddress\n".
        "Address2: $clientAddress2\n".
        "City: $clientCity\n".
        "State: $clientState\n".
        "Zip: $clientZip\n".
        "\n".
        "Residential Provider Info:\n".
        "First Name: $providerFirst\n".
        "Last Name: $providerLast\n".
        "E-mail: $providerEmail\n".
        "Phone: $providerPhone\n".
        "Address: $providerAddress\n".
        "Address2: $providerAddress2\n".
        "City: $providerCity\n".
        "State: $providerState\n".
        "Zip: $providerZip\n".
        "\n".
        "Guardian Info:\n".
        "First Name: $guardFirst\n".
        "Last Name: $guardLast\n".
        "E-mail: $guardEmail\n".
        "Phone: $guardPhone\n".
        "Address: $guardAddress\n".
        "Address2: $guardAddress2\n".
        "City: $guardCity\n".
        "State: $guardState\n".
        "Zip: $guardZip\n".
        "\n".
        "NSA Info:\n".
        "First Name: $nsaFirst\n".
        "Last Name: $nsaLast\n".
        "E-mail: $nsaEmail\n".
        "Phone: $nsaPhone\n".
        "Address: $nsaAddress\n".
        "Address2: $nsaAddress2\n".
        "City: $nsaCity\n".
        "State: $nsaState\n".
        "Zip: $nsaZip\n".
        "\n".
        "Emergency Contact Info:\n".
        "First Name: $emergFirst\n".
        "Last Name: $emergLast\n".
        "Emergency Phone: $emergPhone\n".
        "Alternate Phone: $emergAltPhone\n"



    ;

    mail($recipient, $subject, $emailBody, "From: SKCAC@example.com");

    $view = new Template();
    echo $view->render('views2/confirmation.html');
});
$f3->route('GET /thank_you', function() {

    if(!empty($_SESSION)){

        include ('model/db-validate.php');
        include ('model/db-functions.php');


        if (isset($_SESSION['providerAddress2'])){
            $clientAddress2 = $_SESSION['clientAddress2'];
        }else{
            $clientAddress2 = "N/A";
        }
        if(containsParticipant($_SESSION['clientFirst'],$_SESSION['clientLast'])){

            updateParticipant(getParticipantID($_SESSION['clientFirst'],$_SESSION['clientLast']),
                $_SESSION['clientAddress'], $_SESSION['clientCity'], $_SESSION['clientState'],
                $_SESSION['clientZip'],$_SESSION['clientPhone'], $_SESSION['clientEmail'],1,
                $clientAddress2);

        }else{

            addParticipant($_SESSION['clientFirst'],$_SESSION['clientLast'],$_SESSION['clientAddress'],
                $_SESSION['clientCity'], $_SESSION['clientState'],$_SESSION['clientZip'],$_SESSION['clientPhone'],
                $_SESSION['clientEmail'],1, $clientAddress2);


        }

        $participantID = getParticipantID($_SESSION['clientFirst'],$_SESSION['clientLast']);

        if (isset($_SESSION['providerAddress2'])){
            $providerAddress2 = $_SESSION['providerAddress2'];
        }else{
            $providerAddress2 = "N/A";
        }

        addProvider($participantID, $_SESSION['providerFirst'], $_SESSION['providerLast'],
            $_SESSION['providerAddress'],$_SESSION['providerCity'], $_SESSION['providerState'],
            $_SESSION['providerZip'], $_SESSION['providerPhone'], $_SESSION['providerEmail'],
            $providerAddress2);
        //work in progress
        /*if(containsProvider($participantID,$_SESSION['providerFirst'],$_SESSION['providerLast'])){

            updateProvider($participantID, $_SESSION['providerFirst'], $_SESSION['providerLast'],
                $_SESSION['providerAddress'],$_SESSION['providerCity'], $_SESSION['providerState'],
                $_SESSION['providerZip'], $_SESSION['providerPhone'], $_SESSION['providerEmail'],
                $providerAddress2);
        }else{

            addProvider($participantID, $_SESSION['providerFirst'], $_SESSION['providerLast'],
                $_SESSION['providerAddress'],$_SESSION['providerCity'], $_SESSION['providerState'],
                $_SESSION['providerZip'], $_SESSION['providerPhone'], $_SESSION['providerEmail'],
                $providerAddress2);
        }*/

        if(isset($_SESSION['guardianFirst'])){

            if(containsGuardian($participantID,$_SESSION['guardianFirst'],$_SESSION['guardianLast'])){

                updateGuardian($participantID,$_SESSION['guardianFirst'], $_SESSION['guardianLast'],
                    $_SESSION['guardianAddress'], $_SESSION['guardianCity'], $_SESSION['guardianState'],
                    $_SESSION['guardianZip'], $_SESSION['guardianPhone'], $_SESSION['guardianEmail'],
                    (isset($_SESSION['guardianAddress2']))? $_SESSION['guardianAddress2'] : "");

            }else{

                addGuardian($participantID,$_SESSION['guardianFirst'], $_SESSION['guardianLast'],
                    $_SESSION['guardianAddress'], $_SESSION['guardianCity'], $_SESSION['guardianState'],
                    $_SESSION['guardianZip'], $_SESSION['guardianPhone'], $_SESSION['guardianEmail'],
                    (isset($_SESSION['guardianAddress2']))? $_SESSION['guardianAddress2'] : "");
            }
        }else{

            if(containsGuardian($participantID,$_SESSION['guardianFirst'],$_SESSION['guardianLast'])){

                updateGuardian($participantID,"N/A","N/A","N/A","N/A","N/A","N/A","N/A","N/A","N/A");

            }else{

                addGuardian($participantID,"N/A","N/A","N/A","N/A","N/A","N/A","N/A","N/A","N/A");
            }
        }

        if(isset($_SESSION['medications[]'])){

            for($i = 0; $i < sizeof($_SESSION['medications[]']);$i++) {

                if(containsMedication($participantID,$_SESSION['medications[]'][$i])){

                    updateMedFrequency($participantID,$_SESSION['medications[]'][$i],
                        $_SESSION['frequences[]'][$i]);

                    updateMedFrequency($participantID,$_SESSION['medications[]'][$i],
                        $_SESSION['time[]'][$i]);
                }else{

                    addMedication($participantID, $_SESSION['medications[]'][$i], $_SESSION['frequences[]'][$i],
                        $_SESSION['time[]'][$i]);
                }
            }
        }

        if(isset($_SESSION['medicalAlerts']) OR isset($_SESSION['medicalAlerts'])
            OR isset($_SESSION['medicalAlerts'])){

            if(containsMedAlerts($participantID)){

                updateMedAlerts($participantID,$_SESSION['medicalAlerts']);
                updatePhysicalLimits($participantID, $_SESSION['physicalLimitations']);
                updateDietRestrictions($participantID,$_SESSION['dietRestrictions']);

            }else{

                addAlertsLimitsDiet($participantID, $_SESSION["medicalAlerts"],
                    (isset($_SESSION['physicalLimitations']))? $_SESSION['physicalLimitations'] : "",
                    (isset($_SESSION['dietRestrictions']))? $_SESSION['guardianAddress2'] : "");
            }
        }


    }
    $view = new Template();
    echo $view->render('views2/thank_you.html');
    // resets session, clears everything
    //$_SESSION = array();
});
//run fat free framework
$f3->run();
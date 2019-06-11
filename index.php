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
$f3->route('GET|POST /forms', function() {

    $view = new Template();
    echo $view->render('views2/forms.html');
});
// defines a route for the confirmation page
$f3->route('GET|POST /confirmation', function($f3) {

    include ('model/db-validate.php');

    // do something here...
    if(!empty($_SESSION)){

        if(validateForms($_SESSION)){

            include ('model/db-functions.php');



            if(containsParticipant($_SESSION['clientFirst'],$_SESSION['clientLast'])){

                updateParticipant(getParticipantID($_SESSION['clientFirst'],$_SESSION['clientLast']),
                    $_SESSION['clientAddress'], $_SESSION['clientCity'], $_SESSION['clientState'],
                    $_SESSION['clientZip'],$_SESSION['clientPhone'], $_SESSION['clientEmail'],1,
                    (isset($_SESSION['clientAddress2']) ? $_SESSION['clientAddress2'] : ""));

            }else{

                addParticipant($_SESSION['clientFirst'],$_SESSION['clientLast'],$_SESSION['clientAddress'],
                    $_SESSION['clientCity'], $_SESSION['clientState'],$_SESSION['clientZip'],$_SESSION['clientPhone'],
                    $_SESSION['clientEmail'],1,
                    (isset($_SESSION['clientAddress2']) ? $_SESSION['clientAddress2'] : ""));

            }

            $participantID = getParticipantID($_SESSION['clientFirst'],$_SESSION['clientLast']);

            if(containsProvider($participantID,$_SESSION['providerFirst'],$_SESSION['providerLast'])){

                updateProvider($participantID, $_SESSION['providerFirst'], $_SESSION['providerLast'],
                    $_SESSION['providerAddress'],$_SESSION['providerCity'], $_SESSION['providerState'],
                    $_SESSION['providerZip'], $_SESSION['providerPhone'], $_SESSION['providerEmail'],
                    (isset($_SESSION['providerAddress2']))? $_SESSION['providerAddress2'] : "");
            }else{

                addProvider($participantID, $_SESSION['providerFirst'], $_SESSION['providerLast'],
                    $_SESSION['providerAddress'],$_SESSION['providerCity'], $_SESSION['providerState'],
                    $_SESSION['providerZip'], $_SESSION['providerPhone'], $_SESSION['providerEmail'],
                    (isset($_SESSION['providerAddress2']))? $_SESSION['providerAddress2'] : "");
            }

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
    }

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
<?php


/**
 * @param array $session
 * @param $f3 fat-free variable
 * @return bool
 */
function validateForms(array $session, $f3){


    //initiate isValid is true
    $isValid = true;


    //PARTICIPANT FORM

    //check to see if first name is set
    //check to see if clients first name is only alphabetic
    if(isset($session['clientFirst']) AND !validName($session['clientFirst'])){

        $isValid = false;
        $f3->set("error['clientFirst']","Please put a valid first name for participant");
    }

    //check to see if last name is set
    //check to see if clients last name is only alphabetic
    if(isset($session['clientLast']) AND !validName($session['clientLast'])){

        $isValid = false;
        $f3->set("error['clientLast']","Please put a valid last name for participant");
    }

    //check to see if email is set
    //check to see if client's email is valid email
    if(isset($session['clientEmail']) AND !validEmail($session['clientEmail'])){

        $isValid = false;
        $f3->set("error['clientEmail']","Please put a valid email for participant");

    }

    //check to see if phone is set
    //check to see if client's phone is valid
    if(isset($session['clientPhone']) AND !validPhone($session['clientPhone'])){

        $isValid = false;
        $f3->set("error['clientPhone']","Please put a valid phone number for participant");

    }

    //check to see if address is set
    //check to see if client's address is valid
    if(isset($session['clientAddress']) AND !validAddress($session['clientAddress'])){

        $isValid = false;
        $f3->set("error['clientAddress']","Please put a valid address for participant");

    }

    //check to see if address2 isSet
    //if it is set check to see if it is valid
    if(isset($session['clientAddress2']) AND !validAddress($session['clientAddress2'])){

        $isValid = false;
        $f3->set("error['clientAddress2']","Please put a valid secondary address for participant");

    }else{
        $_SESSION['clientAddress2'] = "N/A";
    }

    //check to see if city is set
    //check to see if city is valid
    if(isset($session['clientCity']) AND !validName($session['clientCity'])){

        $isValid = false;
        $f3->set("error['clientCity']","Please put a valid city for participant");

    }

    //check to see if state is set
    //check to see if state is valid
    if(isset($session['clientState']) AND !validName($session['clientState'])){

        $isValid = false;
        $f3->set("error['clientState']","Please put a valid state for participant");

    }

    //check to see if zip code is set
    //check to see if zip code is valid
    if(isset($session['clientZip']) AND !validZip($session['clientZip'])){

        $isValid = false;
        $f3->set("error['clientZip']","Please put a valid zip for participant");
    }

    //PROVIDER FORM


    //check to see if first name is only alphabetic
    if(isset($session['providerFirst']) AND !validName($session['providerFirst'])){

        $isValid = false;
        $f3->set("error['providerFirst']","Please put a valid first name for provider");
    }

    //check to see if last name is only alphabetic
    if(isset($session['providerLast']) AND !validName($session['providerLast'])){

        $isValid = false;
        $f3->set("error['providerLast']","Please put a valid last name for provider");
    }

    //check to see if email is valid
    if(isset($session['providerEmail']) AND !validEmail($session['providerEmail'])){

        $isValid = false;
        $f3->set("error['providerEmail']","Please put a valid email for provider");
    }

    //check to see if phone is valid
    if(isset($session['providerPhone']) AND !validPhone($session['providerPhone'])){

        $isValid = false;
        $f3->set("error['providerPhone']","Please put a valid phone number for provider");
    }

    //check to see if address is valid
    if(isset($session['providerAddress']) AND !validAddress($session['providerAddress'])){

        $isValid = false;
        $f3->set("error['providerAddress']","Please put a valid address for provider");
    }

    //check to see if address2 isSet
    if(isset($session['providerAddress2']) AND !validAddress($session['providerAddress2'])){

        $isValid = false;
        $f3->set("error['providerAddress2']","Please put a valid secondary address for provider");

    }else{
        $_SESSION['providerAddress2'] = "N/A";
    }

    //check to see if city is valid
    if(isset($session['providerCity']) AND !validName($session['providerCity'])){

        $isValid = false;
        $f3->set("error['providerCity']","Please put a valid city for provider");
    }

    //check to see if state is valid
    if(isset($session['providerState']) AND !validName($session['providerState'])){

        $isValid = false;
        $f3->set("error['providerState']","Please put a valid state for provider");
    }

    //check to see if zip code is valid
    if(isset($session['providerZip']) AND !validZip($session['providerZip'])){

        $isValid = false;
        $f3->set("error['providerZip']","Please put a valid zip code for provider");
    }

    //GUARDIAN FORM

    //check to see if first name is only alphabetic
    if(isset($session['guardianFirst']) AND !validName($session['guardianFirst'])){

        $isValid = false;
        $f3->set("error['guardianFirst']","Please put a valid first name for guardian");
    }

    //check to see if last name is only alphabetic
    if(isset($session['guardianLast']) AND !validName($session['guardianLast'])){

        $isValid = false;
        $f3->set("error['guardianLast']","Please put a valid last name for guardian");
    }

    //check to see if email is valid
    if(isset($session['guardianEmail']) AND !validEmail($session['guardianEmail'])){

        $isValid = false;
        $f3->set("error['guardianEmail']","Please put a valid email for guardian");
    }

    //check to see if phone is valid
    if(isset($session['guardianPhone']) AND !validPhone($session['guardianPhone'])){

        $isValid = false;
        $f3->set("error['guardianPhone']","Please put a valid phone number for guardian");
    }

    //check to see if address is valid
    if(isset($session['guardianAddress']) AND !validAddress($session['guardianAddress'])){

        $isValid = false;
        $f3->set("error['guardianAddress']","Please put a valid address for guardian");
    }

    //check to see if address2 isSet
    if(isset($session['guardianAddress2']) AND !validAddress($session['guardianAddress2'])){

        $isValid = false;
        $f3->set("error['guardianAddress2']","Please put a valid secondary address for guardian");

    }else{
        $_SESSION['guardianAddress2'] = "N/A";
    }

    //check to see if city is valid
    if(isset($session['guardianCity']) AND !validName($session['guardianCity'])){

        $isValid = false;
        $f3->set("error['guardianCity']","Please put a valid city for guardian");
    }

    //check to see if state is valid
    if(isset($session['guardianState']) AND !validName($session['guardianState'])){

        $isValid = false;
        $f3->set("error['guardianState']","Please put a valid state for guardian");
    }

    //check to see if zip code is valid
    if(isset($session['guardianZip']) AND !validZip($session['guardianZip'])){

        $isValid = false;
        $f3->set("error['guardianZip']","Please put a valid zip code for guardian");
    }

    //NSA FORM

    //check to see if first name is only alphabetic
    if(isset($session['nsaFirst']) AND !validName($session['nsaFirst'])){

        $isValid = false;
        $f3->set("error['nsaFirst']","Please put a valid first name for NSA");
    }

    //check to see if last name is only alphabetic
    if(isset($session['nsaLast']) AND !validName($session['nsaLast'])){

        $isValid = false;
        $f3->set("error['nsaLast']","Please put a valid last name for NSA");
    }

    //check to see if email is valid
    if(isset($session['nsaEmail']) AND !validEmail($session['nsaEmail'])){

        $isValid = false;
        $f3->set("error['nsaEmail']","Please put a valid email for NSA");
    }

    //check to see if phone is valid
    if(isset($session['nsaPhone']) AND !validPhone($session['nsaPhone'])){

        $isValid = false;
        $f3->set("error['nsaPhone']","Please put a valid phone number for NSA");
    }

    //EMERGENCY CONTACT FORM

    //check to see if first name is only alphabetic
    if(isset($session['emergFirst']) AND !validName($session['emergFirst'])){

        $isValid = false;
        $f3->set("error['emergFirst']","Please put a valid first name for emergency contact");
    }

    //check to see if last name is only alphabetic
    if(isset($session['emergLast']) AND !validName($session['emergLast'])){

        $isValid = false;
        $f3->set("error['emergLast']","Please put a valid last name for emergency contact");
    }

    //check to see if email is valid
    if(isset($session['emergEmail']) And !validEmail($session['emergEmail'])){

        $isValid = false;
        $f3->set("error['emergMail']","Please put a valid email address for emergency contact");
    }

    //check to see if phone is valid
    if(isset($session['emergPhone']) AND !validPhone($session['emergPhone'])){

        $isValid = false;
        $f3->set("error['emergPhone']","Please put a valid phone number for emergency contact");
    }

    //check to see if alternate phone is set
    if(isset($session['emergAltPhone']) AND !validPhone($session['emergAltPhone'])){

        $isValid = false;
        $f3->set("error['emergAltPhone']","Please put a valid alternate phone number for emergency contact");

    }else{
        $_SESSION['emergAltPhone'] = "";
    }

    //check to see if medications are set
    if(isset($session['medications[]'])){

        //if medications is set, use address function to check
        //that other than spaces it only has alphanumeric characters
        for($i = 0; $i < sizeof($session['medications[]']); $i++){
            if(!validAddress($session['medications[]'][$i])){

                $isValid = false;
                $f3->set("error['medication[".($i)."]']","Please put a valid medication on line ".($i+1));
            }
        }
    }

    //check to see if frequencies are set
    if(isset($session['frequences[]'])){

        //if frequences is set, use address function to check
        //that other than spaces it only has alphanumeric characters
        for($i = 0; $i < sizeof($session['frequences[]']); $i++){
            if(!validAddress($session['frequences[]'][$i])){

                $isValid = false;
                $f3->set("error['frequences[".($i)."]']","Please put a valid frequency on line ".($i+1));
            }
        }
    }

    //check to see if times taken are set
    if(isset($session['time[]'])){

        //if time is set, use address function to check
        //that other than spaces it only has alphanumeric characters
        for($i = 0; $i < sizeof($session['time[]']); $i++){
            if(!validAddress($session['time[]'][$i])){

                $isValid = false;
                $f3->set("error['time[".($i)."]']","Please put a valid time on line ".($i+1));
            }
        }
    }

    //check to see if medical alert have been set
    if(isset($session['medicalAlerts'])){

        //if is set strip out commas and spaces and
        //check to see if the rest is valid
        if(!validTextArea($session['medicalAlerts'])){

            $isValid = false;
            $f3->set("error['medicalAlerts']","Please put valid medical alerts");
        }
    }

    //check to see if physical limitations have been set
    if(isset($session['physicalLimitations'])){

        //if is set strip out commas and spaces and
        //check to see if the rest is valid
        if(!validTextArea($session['physicalLimitations'])){

            $isValid = false;
            $f3->set("error['physicalLimitations']","Please put valid physical limitations");
        }
    }

    //check to see if diet restrictions have been set
    if(isset($session['dietRestrictions'])){

        //if is set strip out commas and spaces and
        //check to see if the rest is valid
        if(!validTextArea($session['dietRestrictions'])){

            $isValid = false;
            $f3->set("error['dietRestrictions']","Please put valid diet restrictions");
        }
    }

    //check referring option is set
    if(isset($session['referring'])){

        //valid options for referring
        $referring = array("dshs", "dvr");

        //check to see if referring option is not spoofed
        if(!in_array($session['referring'],$referring)){

            $isValid = false;
            $f3->set("error['referring']","Please choose a valid referral organization");
        }
    }

    //check to see if provider is set
    if(isset($session['provider']) AND !validName($session['provider'])){

        $isValid = false;
        $f3->set("error['provider']","Please put a valid provider");

    }

    //check funding option is set
    if(isset($session['funding'])){

        //valid options for funding
        $funding = array("dds", "fundingDVR");

        //check to see if funding option is not spoofed
        if(!in_array($session['funding'],$funding)){
            $isValid = false;
            $f3->set("error['funding']","Please choose a valid funding organization");
        }
    }

    //check to see if employer input is valid
    if(isset($session['employer']) AND !validName($session['employer'])){

        $isValid = false;
        $f3->set("error['employer']","Please put a valid employer");
    }

    //check to see if other is set
    //if other is set check if it is valid
    if(isset($session['other']) AND !validTextArea($session['other'])){

        $isValid = false;
        $f3->set("error['other']","Please put valid text for other");

    }

    //SSI FORM

    //check to see if amount 1 is set
    {
        if(isset($session['amount1']) AND !validMoneyAmount($session['amount1'])){

            $isValid = false;
            $f3->set("error['amount1']","Please put a valid money amount for SSDI amount");
        }
    }

    //check to see if amount 2 is set
    if(isset($session['amount2']) AND !validMoneyAmount($session['amount2'])){

        //check to see if amount 2 is valid
        if(!validMoneyAmount($session['amount2'])){

            $isValid = false;
            $f3->set("error['amount2']","Please put a valid money amount for SSI amount");
        }
    }
    

    //return true if all validations pass
    return $isValid;
}

/**
 * @param $name
 * @return bool
 */
function validName($name){
    $stripedName = str_replace(" ","",$name);
    return $stripedName != "" AND ctype_alpha($stripedName);
}

/**
 * @param $age
 * @return bool
 */
function validAge($age){
    if($age == "") {
        return false;
    }

    return !is_nan($age)  AND $age >= 18;
}

/**
 * @param $phone
 * @return bool
 */
function validPhone($phone){
    //eliminate every char except 0-9
    if(strlen($phone) > 11){
        $phone = preg_replace("[^0-9]", "",$phone);
    }

    //remove leading 1 if it's there
    if (strlen($phone) == 11) {
        $phone = preg_replace("/^1/", "",$phone);
    }

    return (strlen($phone)) === 10;
}

/**
 * @param $email string representation of email address
 * @return boolean true if email is valid and false if not
 */
function validEmail($email){

    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param $address
 * @return bool
 */
function validAddress($address){
    $stripedAddress = str_replace(" ","",$address);
    return $stripedAddress != "" AND ctype_alnum($stripedAddress);
}

/**
 * @param $zip
 * @return false|int
 */
function validZip($zip) {

    return preg_match('#^[0-9]{5}(-[0-9]{4})?$#', $zip);
}

function validTextArea($text){

    $stripedText = preg_replace('/[\\s,]+/',"",$text);

    return ctype_alnum($stripedText);
}

/**
 * @param $amount
 * @return bool
 */
function validMoneyAmount($amount){

    $stripedAmount = preg_replace('/[\\s,.$]+/',"",$amount);

    return ctype_digit($stripedAmount);
}


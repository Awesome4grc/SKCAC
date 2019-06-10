<?php


/**
 * @param array $session
 * @return bool
 */
function validateForms(array $session){

    //initiate isValid is true
    $isValid = true;

    //PARTICIPANT FORM

    //check to see if clients first name is only alphabetic
    if(!validName($session['clientFirst'])){
        $isValid = false;
    }
    //check to see if clients last name is only alphabetic
    if(!validName($session['clientLast'])){
        $isValid = false;
    }

    //check to see if client's email is valid email
    if(!validEmail($session['clientEmail'])){
        $isValid = false;
    }

    //check to see if client's phone is valid
    if(!validPhone($session['clientPhone'])){
        $isValid = false;
    }

    //check to see if client's address is valid
    if(!validAddress($session['clientAddress'])){
        $isValid = false;
    }

    //check to see if address2 isSet
    if(isset($session['clientAddress2'])){

        //if it is set check to see if it is valid
        if(!validAddress($session['clientAddress2'])){
            $isValid = false;
        }
    }else{
        $_SESSION['clientAddress2'] = "N/A";
    }

    //check to see if city is valid
    if(!validName($session['clientCity'])){
        $isValid = false;
    }

    //check to see if state is valid
    if(!validName($session['clientState'])){
        $isValid = false;
    }

    //check to see if zip code is valid
    if(!validZip($session['clientZip'])){
        $isValid = false;
    }

    //PROVIDER FORM

    //check to see if first name is only alphabetic
    if(!validName($session['providerFirst'])){
        $isValid = false;
    }
    //check to see if last name is only alphabetic
    if(!validName($session['providerLast'])){
        $isValid = false;
    }

    //check to see if email is valid
    if(!validEmail($session['providerEmail'])){
        $isValid = false;
    }

    //check to see if phone is valid
    if(!validPhone($session['providerPhone'])){
        $isValid = false;
    }

    //check to see if address is valid
    if(!validAddress($session['providerAddress'])){
        $isValid = false;
    }

    //check to see if address2 isSet
    if(isset($session['providerAddress2'])){

        //if it is set check to see if it is valid
        if(!validAddress($session['providerAddress2'])){
            $isValid = false;
        }
    }else{
        $_SESSION['providerAddress2'] = "N/A";
    }

    //check to see if city is valid
    if(!validName($session['providerCity'])){
        $isValid = false;
    }

    //check to see if state is valid
    if(!validName($session['providerState'])){
        $isValid = false;
    }

    //check to see if zip code is valid
    if(!validZip($session['providerZip'])){
        $isValid = false;
    }

    //GUARDIAN FORM

    //check to see if first name is only alphabetic
    if(!validName($session['guardianFirst'])){
        $isValid = false;
    }
    //check to see if last name is only alphabetic
    if(!validName($session['guardianLast'])){
        $isValid = false;
    }

    //check to see if email is valid
    if(!validEmail($session['guardianEmail'])){
        $isValid = false;
    }

    //check to see if phone is valid
    if(!validPhone($session['guardianPhone'])){
        $isValid = false;
    }

    //check to see if address is valid
    if(!validAddress($session['guardianAddress'])){
        $isValid = false;
    }

    //check to see if address2 isSet
    if(isset($session['guardianAddress2'])){

        //if it is set check to see if it is valid
        if(!validAddress($session['guardianAddress2'])){
            $isValid = false;
        }
    }else{
        $_SESSION['guardianAddress2'] = "N/A";
    }

    //check to see if city is valid
    if(!validName($session['guardianCity'])){
        $isValid = false;
    }

    //check to see if state is valid
    if(!validName($session['guardianState'])){
        $isValid = false;
    }

    //check to see if zip code is valid
    if(!validZip($session['guardianZip'])){
        $isValid = false;
    }

    //NSA FORM

    //check to see if first name is only alphabetic
    if(!validName($session['nsaFirst'])){
        $isValid = false;
    }
    //check to see if last name is only alphabetic
    if(!validName($session['nsaLast'])){
        $isValid = false;
    }

    //check to see if email is valid
    if(!validEmail($session['nsaEmail'])){
        $isValid = false;
    }

    //check to see if phone is valid
    if(!validPhone($session['nsaPhone'])){
        $isValid = false;
    }

    //EMERGENCY CONTACT FORM

    //check to see if first name is only alphabetic
    if(!validName($session['emergFirst'])){
        $isValid = false;
    }
    //check to see if last name is only alphabetic
    if(!validName($session['emergLast'])){
        $isValid = false;
    }

    //check to see if email is valid
    if(!validEmail($session['emergEmail'])){
        $isValid = false;
    }

    //check to see if phone is valid
    if(!validPhone($session['emergPhone'])){
        $isValid = false;
    }

    //check to see if alternate phone is set
    if(isset($session['emergAltPhone'])){

        //if it is set check to see if it is valid
        if(!validPhone($session['guardianPhone'])){
            $isValid = false;
        }
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
            }
        }
    }

    //check to see if times taken are set
    if(isset($session['time[]'])){

        //if frequences is set, use address function to check
        //that other than spaces it only has alphanumeric characters
        for($i = 0; $i < sizeof($session['time[]']); $i++){
            if(!validAddress($session['time[]'][$i])){
                $isValid = false;
            }
        }
    }

    //check to see if medical alert have been set
    if(isset($session['medicalAlerts'])){

        //if is set strip out commas and spaces and
        //check to see if the rest is valid
        if(!validTextArea($session['medicalAlerts'])){
            $isValid = false;
        }
    }

    //check to see if physical limitations have been set
    if(isset($session['physicalLimitations'])){

        //if is set strip out commas and spaces and
        //check to see if the rest is valid
        if(!validTextArea($session['physicalLimitations'])){
            $isValid = false;
        }
    }

    //check to see if diet restrictions have been set
    if(isset($session['dietRestrictions'])){

        //if is set strip out commas and spaces and
        //check to see if the rest is valid
        if(!validTextArea($session['dietRestrictions'])){
            $isValid = false;
        }
    }

    //check referring option is set
    if(isset($session['referring'])){

        //valid options for referring
        $referring = array("dshs", "dvr");

        //check to see if referring option is not spoofed
        if(!in_array($session['referring'],$referring)){
            $isValid = false;
        }
    }

    //check to see if provider is set
    if(isset($session['provider'])){

        //check to see if provider input is valid
        if(!validName($session['provider'])){
            $isValid = false;
        }
    }

    //check funding option is set
    if(isset($session['funding'])){

        //valid options for funding
        $funding = array("dds", "fundingDVR");

        //check to see if funding option is not spoofed
        if(!in_array($session['funding'],$funding)){
            $isValid = false;
        }
    }

    //check to see if employer input is valid
    if(!validName($session['employer'])){

        $isValid = false;
    }

    //check to see if other is set
    if(isset($session['other'])){

        //if other is set check if it is valid
        if(!validTextArea($session['other'])){
            $isValid = false;
        }
    }

    //SSI FORM

    //check to see if amount 1 is set
    {
        if(isset($session['amount1'])){

            //check to see if amount 1 is valid
            if(!validMoneyAmount($session['amount1'])){

                $isValid = false;
            }
        }
    }

    //check to see if amount 2 is set
    if(isset($session['amount2'])){

        //check to see if amount 2 is valid
        if(!validMoneyAmount($session['amount2'])){

            $isValid = false;
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
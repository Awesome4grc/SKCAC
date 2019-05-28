<?php
    function validateParticipantInformationForm() {
        global $f3;
        $isValid = true;

        /*
        // checks first name
        if (!validateName($f3->get('pFName'))) {
            $isValid = false;
            $f3->set("errors['fname']", "Required field, please re-enter first name with letters only");
        }

        // checks last name
        if (!validateName($f3->get('lname'))) {
            $isValid = false;
            $f3->set("errors['lname']", "Required field, please re-enter last name with letters only");
        }

        // checks age
        if (!validateAge($f3->get('age'))) {
            $isValid = false;
            $f3->set("errors['age']", "Required field, please re-enter age with a number from 18 to 118");
        }

        // todo: validate gender?

        // checks phone number
        if (!validatePhone($f3->get('phone'))) {
            $isValid = false;
            $f3->set("errors['phone']", "Required field, please re-enter phone number with dash");
        }
        */

        return $isValid;
    }

    /*
     * Checks if a string contains all alphabetic
     * @return true|false
     */
    function validateName($name) {
        return ctype_alpha($name);
    }

    /*
     * Checks if a phone number is valid
     * @true|false
     */
    function validatePhone($phone) {
        return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone);
    }

    /*
     * Checks if an email is valid
     * @return true|false
     */
    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
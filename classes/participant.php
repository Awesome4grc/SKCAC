<?php
class Participant
{
    private $_fName;
    private $_lName;
    private $_email;
    private $_phone;
    private $_address;
    private $_address2;
    private $_city;
    private $_state;
    private $_zip;

    function __construct($fName, $lName, $email, $phone, $address, $address2="N/A", $city, $state, $zip)
    {
        $this->_fName = $fName;
        $this->_lName = $lName;
        $this->_email = $email;
        $this->_phone = $phone;
        $this->_address = $address;
        $this->_address2 = $address2;
        $this->_city = $city;
        $this->_state = $state;
        $this->_zip = $zip;
    }

    function setFirstName($fname)
    {
        $this->_fName = $fname;
    }

    function getFirstName()
    {
        return $this->_fName;
    }

    function setLastName($lname)
    {
        $this->_lName = $lname;
    }

    function getLastName()
    {
        return $this->_lName;
    }

    function setEmail($email)
    {
        $this->_email = $email;
    }

    function getEmail()
    {
        return $this->_email;
    }

    function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    function getPhone()
    {
        return $this->_phone;
    }

    function setAddress($address)
    {
        $this->_address = $address;
    }

    function getAddress()
    {
        return $this->_address;
    }

    function setAddress2($address2)
    {
        $this->_address2 = $address2;
    }

    function getAddress2()
    {
        return $this->_address2;
    }

    function setCity($city)
    {
        $this->_city = $city;
    }

    function getCity()
    {
        return $this->_city;
    }

    function setState($state)
    {
        $this->_state = $state;
    }

    function getState()
    {
        return $this->_state;
    }

    function setZip($zip)
    {
        $this->_zip = $zip;
    }

    function getZip()
    {
        return $this->_zip;
    }
}

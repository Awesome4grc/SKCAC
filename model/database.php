<!-- Bo is  working on it. -->

<?php

$user = $_SERVER['USER'];
require "/home/$user/config355.php";

/*
define("DB_DSN", 'mysql:dbname=bzhanggr_it355');
define("DB_USERNAME", 'bzhanggr');
define("DB_PASSWORD", 'Cp19860719');
*/

class Database
{
    private $_dbh;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'connected!';
            return $this->_dbh;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    function insertParticipant($participant)
    {
        $fname = $participant->getFirstName();
        $lname = $participant->getLastName();
        $email = $participant->getEmail();
        $phone = $participant->getPhone();
        $address = $participant->getAddress();
        $address2 = $participant->getAddress2();
        $city = $participant->getCity();
        $state = $participant->getState();
        $zip = $participant->getZip();

        // 1. defines the query - enters member info into table member
        $sql = "INSERT INTO participant (fname, lname, email, phone, address, address2, city, state, zip) 
                VALUES (:fname, :lname, :email, :phone, :address, :address2, :city, :state, :zip)";

        // 2. prepares the statement
        $statement = $this->_dbh->prepare($sql);

        // 3. binds the parameters
        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':address', $address, PDO::PARAM_STR);
        $statement->bindParam(':address2', $address2, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':zip', $zip, PDO::PARAM_STR);

        // 4. executes the statement
        $statement->execute();
    }

    function getParticipants()
    {
        // 1. defines the query
        $sql = "SELECT * FROM participant ORDER BY lname";

        // 2. prepares the statement
        $statement = $this->_dbh->prepare($sql);

        // 3. binds the parameters
        //(N/A)

        // 4. executes the statement
        $statement->execute();

        // 5. returns the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function getParticipant($participant_id)
    {
        $sql = "SELECT * FROM participant WHERE participant.participant_id = :id";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':id', $participant_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
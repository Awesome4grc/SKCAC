<?php


require_once ('/home2/awesomeg/config.php');



/**
 * connect to the database and create a PDO object
 * with a connection to that database
 *
 * @return bool|PDO true if it connects to the database
 */
function connect(){
    try {
        //Instantiate a database object
        $dbh = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
        return $dbh;
    }
    catch (PDOException $e) {
        //print out error message if connection is not made
        echo "Ah ah ah, You didn't say the magic word!";
        $e->getMessage();
        return false;
    }
}

/**
 * Gets the users from the database
 * @return array of the users from the database
 */
function getClients(){
    //database object
    global $dbh;

    //set the select sql query to select all clients
    $sql = "SELECT username,users.name AS name,xp FROM users 
            INNER JOIN characters ON characters.member = users.member_id";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //execute the sql query
    $statement->execute();

    //fetch all that match sql query
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    //return array of clients
    return $result;

}

//function to check if participant is already added
function containsParticipant($fname,$lname) {
    //database object
    global $dbh;

    $sql = "SELECT * FROM participant WHERE first_name = :first_name AND last_name = :last_name";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':first_name',$fname, PDO::PARAM_STR);
    $statement->bindParam(':last_name',$lname, PDO::PARAM_STR);

    //execute statement
    $statement->execute();

    //count the many of rows
    $count = $statement->rowCount();
    return $count > 0;
}

function addParticipant($fname,$lname,$address,$city,$state,$zip,$phone,$email,$rep = 1,$address2 = " "){
    //database object
    global $dbh;

    //set the insert sql statement for participant not in the database
    $sql = "INSERT INTO participant (first_name,last_name,address_one,address_two,city,state,zip,phone,email,rep_id)
            VALUES (:fname, :lname, :address, :address2, :city, :state, :zip, :phone, :email, :rep_id)";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
    $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
    $statement->bindParam(':address',$address, PDO::PARAM_STR);
    $statement->bindParam(':city',$city, PDO::PARAM_STR);
    $statement->bindParam(':state',$state, PDO::PARAM_STR);
    $statement->bindParam(':zip',$zip, PDO::PARAM_INT);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':email',$email, PDO::PARAM_STR);
    $statement->bindParam(':rep_id',$rep, PDO::PARAM_INT);
    $statement->bindParam(':address2',$address2, PDO::PARAM_STR);

    // Execute the statement
    $success = $statement->execute();
    return $success;
}
function updateParticipant($participant_id,$address,$city,$state,$zip,$phone,$email,$rep = 1,$address2 = " "){
    //database object
    global $dbh;

    //set the update sql query
    $sql = "UPDATE participant SET address_one = :address, address_two = :address2, city = :city, state = :state,
            zip = :zip, phone = :phone, email = :email, rep_id = :rep_id WHERE participant_id = :participant_id";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':address',$address, PDO::PARAM_STR);
    $statement->bindParam(':city',$city, PDO::PARAM_STR);
    $statement->bindParam(':state',$state, PDO::PARAM_STR);
    $statement->bindParam(':zip',$zip, PDO::PARAM_INT);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':email',$email, PDO::PARAM_STR);
    $statement->bindParam(':rep_id',$rep, PDO::PARAM_INT);
    $statement->bindParam(':address2',$address2, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();

    return $success;
}

//function to check if participant is already added
function containsEmergContact($participantID,$fname,$lname) {
    //database object
    global $dbh;

    $sql = "SELECT * FROM emergency_contact WHERE participant_id = :participant_id AND first_name = :first_name 
            AND last_name = :last_name";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':participant_id',$participantID, PDO::PARAM_INT);
    $statement->bindParam(':first_name',$fname, PDO::PARAM_STR);
    $statement->bindParam(':last_name',$lname, PDO::PARAM_STR);

    //execute statement
    $statement->execute();

    //count the many of rows
    $count = $statement->rowCount();
    return $count > 0;
}

function addEmergencyContact($participant_id,$fname,$lname,$phone,$phone2 = " "){
    //database object
    global $dbh;

    $sql = "INSERT INTO emergency_contact (participant_id, first_name, last_name, phone, phone_two)
            VALUES (:participant_id,:fname, :lname, :phone, :phone2)";

    //prepare the sql statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
    $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':phone2',$phone2, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();
    return $success;
}
function updateEmergencyContact($participant_id,$fname,$lname,$phone,$phone2 = " "){
    //database object
    global $dbh;

    $sql = "UPDATE emergency_contact SET first_name = :fname, last_name = :lname, phone = :phone, phone_two = :phone2
            WHERE :participant_id = :participant_id";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
    $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':phone2',$phone2, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();
    return $success;
}

//function to check if participant is already added
function containsGuardian($participantID,$fname,$lname) {
    //database object
    global $dbh;

    $sql = "SELECT * FROM guardian WHERE participant_id = :participant_id AND first_name = :first_name 
            AND last_name = :last_name";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':participant_id',$participantID, PDO::PARAM_INT);
    $statement->bindParam(':first_name',$fname, PDO::PARAM_STR);
    $statement->bindParam(':last_name',$lname, PDO::PARAM_STR);

    //execute statement
    $statement->execute();

    //count the many of rows
    $count = $statement->rowCount();
    return $count > 0;
}

function addGuardian($participant_id,$fname,$lname,$address,$city,$state,$zip,$phone,$email,$address2 = " "){
    //database object
    global $dbh;

    //set the insert sql statement for participant not in the database
    $sql = "INSERT INTO guardian (participant_id, first_name, last_name, address_one, address_two, city, state,
            zip, phone, email) VALUES (:participant_id,:fname, :lname, :address, :address2, :city, :state, :zip, 
            :phone, :email)";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
    $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
    $statement->bindParam(':address',$address, PDO::PARAM_STR);
    $statement->bindParam(':city',$city, PDO::PARAM_STR);
    $statement->bindParam(':state',$state, PDO::PARAM_STR);
    $statement->bindParam(':zip',$zip, PDO::PARAM_INT);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':email',$email, PDO::PARAM_STR);
    $statement->bindParam(':address2',$address2, PDO::PARAM_STR);

    // Execute the statement
    $success = $statement->execute();

    //return true if successful or false if not
    return $success;
}
function updateGuardian($participant_id,$fname,$lname,$address,$city,$state,$zip,$phone,$email,$address2 = " "){
    //database object
    global $dbh;

    //set the update sql query
    $sql = "UPDATE guardian SET first_name = :fname, last_name = :lname, address_one = :address, 
            address_two = :address2, city = :city, state = :state, zip = :zip, phone = :phone, email = :email
            WHERE participant_id = :participant_id";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
    $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
    $statement->bindParam(':address',$address, PDO::PARAM_STR);
    $statement->bindParam(':city',$city, PDO::PARAM_STR);
    $statement->bindParam(':state',$state, PDO::PARAM_STR);
    $statement->bindParam(':zip',$zip, PDO::PARAM_INT);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':email',$email, PDO::PARAM_STR);
    $statement->bindParam(':address2',$address2, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();

    //return if update is successful or false if not
    return $success;
}

function addMedication($participant_id,$name,$frequency,$timeTaken){
    //database object
    global $dbh;

    $sql = "INSERT INTO medications (participant_id, medication_name, frequency_taken, time_taken)
            VALUES (:participant_id,:name, :frequency, :time_taken)";

    //prepare the sql statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':name',$name, PDO::PARAM_STR);
    $statement->bindParam(':frequency',$frequency, PDO::PARAM_STR);
    $statement->bindParam(':time_taken',$timeTaken, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();

    //return true if query is successful and false if not
    return $success;
}

//function to check if medication already is added for participant
function containsMedication($participant_id,$medication) {
    //database object
    global $dbh;

    $sql = "SELECT * FROM medications WHERE participant_id = :participant_id AND medication_name = :medication";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':medication',$medication, PDO::PARAM_STR);

    //execute statement
    $statement->execute();

    //count the many of rows
    $count = $statement->rowCount();
    return $count > 0;
}

//function to update the frequency a medication is taken
function updateMedFrequency($participant_id,$medication,$newFrequency) {
    //database object
    global $dbh;

    $sql = "UPDATE medications SET frequency_taken = :frequency WHERE :participant_id = :participant_id AND 
            medication_name = :medication";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':medication',$medication, PDO::PARAM_STR);
    $statement->bindParam(':frequency',$newFrequency, PDO::PARAM_STR);



    // Execute the statement
    $success = $statement->execute();

    //return true if successful false if not
    return $success;
}

//function to update the time a medication is taken
function updateMedTimeTaken($participant_id,$medication,$newTime) {
    //database object
    global $dbh;

    $sql = "UPDATE medications SET time_taken = :newTime WHERE :participant_id = :participant_id AND 
            medication_name = :medication";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':medication',$medication, PDO::PARAM_STR);
    $statement->bindParam(':newTime',$newTime, PDO::PARAM_STR);



    // Execute the statement
    $success = $statement->execute();

    //return true if successful false if not
    return $success;
}

//function to check if med alerts are already added
function containsMedAlerts($participantID) {
    //database object
    global $dbh;

    $sql = "SELECT * FROM other WHERE participant_id = :participant_id";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':participant_id',$participantID, PDO::PARAM_INT);

    //execute statement
    $statement->execute();

    //count the many of rows
    $count = $statement->rowCount();
    return $count > 0;
}

function addAlertsLimitsDiet($participant_id,$alerts = "",$limits = "",$diet = ""){
    //database object
    global $dbh;

    $sql = "INSERT INTO other (participant_id, medical_alerts, physical_limitations, diet_restrictions)
            VALUES (:participant_id,:alerts, :limits, :diet)";

    //prepare the sql statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':alerts',$alerts, PDO::PARAM_STR);
    $statement->bindParam(':limits',$limits, PDO::PARAM_STR);
    $statement->bindParam(':diet',$diet, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();

    //return true if query is successful and false if not
    return $success;

}

//function to update medical alerts
function updateMedAlerts($participant_id,$alerts) {
    //database object
    global $dbh;

    $sql = "UPDATE other SET medical_alerts = :alerts WHERE :participant_id = :participant_id";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':alerts',$alerts, PDO::PARAM_STR);

    // Execute the statement
    $success = $statement->execute();

    //return true if successful false if not
    return $success;
}

//function to update physical limits
function updatePhysicalLimits($participant_id,$limits) {
    //database object
    global $dbh;

    $sql = "UPDATE other SET physical_limitations = :limits WHERE :participant_id = :participant_id";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':limits',$limits, PDO::PARAM_STR);

    // Execute the statement
    $success = $statement->execute();

    //return true if successful false if not
    return $success;
}

//function to update physical limits
function updateDietRestrictions($participant_id,$diet) {
    //database object
    global $dbh;

    $sql = "UPDATE other SET diet_restrictions = :diet WHERE :participant_id = :participant_id";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':diet',$diet, PDO::PARAM_STR);

    // Execute the statement
    $success = $statement->execute();

    //return true if successful false if not
    return $success;
}

//function to check if provider is already added
function containsProvider($participantID,$fname,$lname) {
    //database object
    global $dbh;

    $sql = "SELECT * FROM provider WHERE participant_id = :participant_id AND provider_first = :first_name 
            AND provider_last = :last_name";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':participant_id',$participantID, PDO::PARAM_INT);
    $statement->bindParam(':first_name',$fname, PDO::PARAM_STR);
    $statement->bindParam(':last_name',$lname, PDO::PARAM_STR);

    //execute statement
    $statement->execute();

    //count the many of rows
    $count = $statement->rowCount();
    return $count > 0;
}

function addProvider($participant_id,$fname,$lname,$address,$city,$state,$zip,$phone,$email,$address2 = " "){
    //database object
    global $dbh;

    //set the insert sql statement for participant not in the database
    $sql = "INSERT INTO provider (participant_id, provider_first,provider_last, address_one, address_two, city, state,
            zip, phone, email) VALUES (:participant_id,:provider_first,:provider_last, :address, :address2, :city,
            :state, :zip,:phone, :email)";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':provider_first',$fname, PDO::PARAM_STR);
    $statement->bindParam(':provider_last',$lname, PDO::PARAM_STR);
    $statement->bindParam(':address',$address, PDO::PARAM_STR);
    $statement->bindParam(':city',$city, PDO::PARAM_STR);
    $statement->bindParam(':state',$state, PDO::PARAM_STR);
    $statement->bindParam(':zip',$zip, PDO::PARAM_INT);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':email',$email, PDO::PARAM_STR);
    $statement->bindParam(':address2',$address2, PDO::PARAM_STR);

    // Execute the statement
    $success = $statement->execute();

    //return true if successful or false if not
    return $success;
}
function updateProvider($participant_id,$fname,$lname,$address,$city,$state,$zip,$phone,$email,$address2 = " "){
    //database object
    global $dbh;

    //set the update sql query
    $sql = "UPDATE provider SET provider_first = :provider_first,provider_last = ;providier_last, 
            address_one = :address,address_two = :address2, city = :city, state = :state, zip = :zip, 
            phone = :phone, email = :email WHERE participant_id = :participant_id";

    //prepare the statement
    $statement = $dbh->prepare($sql);

    //bind the parameters
    $statement->bindParam(':participant_id',$participant_id, PDO::PARAM_INT);
    $statement->bindParam(':provider_first',$fname, PDO::PARAM_STR);
    $statement->bindParam(':provider_last',$lname, PDO::PARAM_STR);
    $statement->bindParam(':address',$address, PDO::PARAM_STR);
    $statement->bindParam(':city',$city, PDO::PARAM_STR);
    $statement->bindParam(':state',$state, PDO::PARAM_STR);
    $statement->bindParam(':zip',$zip, PDO::PARAM_INT);
    $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
    $statement->bindParam(':email',$email, PDO::PARAM_STR);
    $statement->bindParam(':address2',$address2, PDO::PARAM_STR);


    // Execute the statement
    $success = $statement->execute();

    //return if update is successful or false if not
    return $success;
}

function getParticipantID($fname,$lname){
    //database object
    global $dbh;

    $sql = "SELECT * FROM participant WHERE first_name = :fname AND last_name = :lname";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
    $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['participant_id'];
}


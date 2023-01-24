<?php
include("includes/db.php");
include("includes/header.html");
include("includes/footer.html");

//print alert in case the upload is successful or not
if (insertDataIntoDB($db)){
    echo "<div class='alert alert-primary' id='alert-success' role='alert'>
            The upload was successful. <a href='output.php' class='alert-link'>You can proceed to output page</a>.
            </div>";
} else {
    echo "<div class='alert alert-danger' id='alert-insuccess' role='alert'>
            The uplod was NOT successful. <a href='index.php' class='alert-link'>You can go back and try again</a>. 
        </div>";
};

//function to insert data in db
function insertDataIntoDB($db) {
    // sanitize the input data
    if (isset($_POST['salutation']))  $salutation = filter_var($_POST['salutation'], FILTER_SANITIZE_STRING);
    if (isset($_POST['fname']))  $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    if (isset($_POST['lname']))  $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    if (isset($_POST['tel']))  $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
    if (isset($_POST['email']))  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
  
    //check if the email is already in DB. 
    //If the email is in the db, the data is not uploaded and the user needs to go back
    //if the email is not in the db, the data is uploaded
    
    if(checkEmailDuplicate($db, $email)){
            // insert the data into the database
        try {
            // prepare the SQL statement
            $stmt = $db->prepare("INSERT INTO users (salutation, fname, lname, tel, email) 
                                    VALUES (:salutation, :fname, :lname, :tel, :email)");
            
            // bind the input data to the statement
            $stmt->bindParam(':salutation', $salutation);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':email', $email);
            
            // execute the statement
            $stmt->execute();
            
            // return true if the data was successfully inserted
            return true;
        } catch (PDOException $e) {
            // return false if there was an error
            return false;
        }

    } else {
        echo "<div class='alert alert-danger' id='alert-insuccess' role='alert'>
            This email is already in the database. <a href='index.php' class='alert-link'>You can go back and try again</a>. 
        </div>";
    };

    
    
}

function checkEmailDuplicate($db, $email){
  //check if email exists in the database
  try {
    $stmt = $db->query("SELECT email
                        FROM users 
                        WHERE email = '$email' ");

    $stmt->bindParam(':email', $email);
    $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //if( !$emails){
        if( !$emails OR empty($email)){
        return true;
    } else {
        return false;
    }
         
} catch (PDOException $e) {
    // return false if there was an error
    return false;
}

}


?>




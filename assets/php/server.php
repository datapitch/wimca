<?php

//By Ben Adenle
//datapitch@gmail.com

//initializing variables
$firstName = "";
$lastName = "";
$organisation = "";
$designation = "";
$email = "";
$mobileNumber = "";
$source = "";
$errors = array();

//connect to database
$db = mysqli_connect('localhost', 'wimcang1_pel', 'Macbenads,90', 'wimcang1_registrationWIM');

    //Register user
    if (isset($_POST['submitBtn'])) {
        //Receive completed form data
        $firstName = mysqli_real_escape_string($db, trim($_POST['firstName']));
        $lastName = mysqli_real_escape_string($db, trim($_POST['lastName']));
        $organisation = mysqli_real_escape_string($db, trim($_POST['organisation']));
        $designation = mysqli_real_escape_string($db, trim($_POST['designation']));
        $email = mysqli_real_escape_string($db, trim($_POST['email']));
        $mobileNumber = mysqli_real_escape_string($db, trim($_POST['mobileNumber']));
        $source = mysqli_real_escape_string($db, trim($_POST['source']));

        //Validate form
        if (empty($firstName)) { array_push($errors, "Please enter your First Name"); }
        if (empty($lastName)) { array_push($errors, "Please enter your Last Name"); }
        if (empty($organisation)) { array_push($errors, "Please enter your Organisation"); }
        if (empty($designation)) { array_push($errors, "Please enter your Designation"); }
        if (empty($email)) { array_push($errors, "Please enter your Email"); }
        if (empty($mobileNumber)) { array_push($errors, "Please enter your Mobile Number"); }
        if (empty($source)) { array_push($errors, "Please select where you heard about us"); }

        //Check database to ensure user does not exit
        $qr_check_user = "SELECT * FROM users WHERE firstName='$firstName' OR email='$email' LIMIT 1";
        $result = mysqli_query ($db, $qr_check_user);
        $user = mysqli_fetch_assoc($result);

        if ($user) {//if user exists
            if ($user['email'] === $email)  {
                array_push($errors, "Attendee already registered");
            }
        }

        //Insert new registration into database
        if (count($errors) == 0) {
           $qr_insert_user  = "INSERT INTO users (firstName, lastName, organisation, designation, email, mobileNumber, source)
                            VALUES ('$firstName', '$lastName', '$organisation', '$designation', '$email', '$mobileNumber', '$source')";
           mysqli_query ($db, $qr_insert_user);
           session_start();
           
           sendSMS();
           sendRegistrationEmailParticipant();
           sendRegistrationEmailAdmin();
          
           header('Location: http://success.wimca.ng');
        }
}


function sendSMS() {
    
    $number = trim($_POST['mobileNumber']);
    $name = trim($_POST['firstName']);
    $newline = "
    ";
    $calLink = '<a href="http://calendar.wimca.ng/2021"> Click here </a> to add this event to your calendar!';
    
    $url = "https://gatewayapi.com/rest/mtsms";
    $api_token = "fW8PSD6YRaWhZCU8AejsqDTZBOWVftyeXDGxVMNqWpUDIXO7n02YMlafMW-GkOgP";
    
    //Set SMS recipients and content
    $recipients = [$number];
    $json = [
        'sender' => 'WIMCA2021',
        'message' => 'Dear '.$name.', you have successully registered to attend WIMCA 2021. Kindly keep a date with us by marking this on your calendar and PLAN TO ATTEND!',
        'recipients' => [],
    ];
    foreach ($recipients as $msisdn) {
        $json['recipients'][] = ['msisdn' => $msisdn];
    }


    //Make and execute the http request
    //Using the built-in 'curl' library
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch,CURLOPT_USERPWD, $api_token.":");
    curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($json));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
}

    function sendRegistrationEmailParticipant() {

        $to = trim($_POST['email']);
        $EmailFrom = "WIMCA2021@wimca.ng";
        $Subject = "Your Registration for WIMCA 2021 was successful";

        $message = file_get_contents(mail/index.html);
        
        
      
        $headers = "From: " . $EmailFrom . "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        mail($to, $Subject, $message, $headers); 
    }


    function sendRegistrationEmailAdmin() {
    
        $toAdmin = "wimca@gmail.com";
        $EmailFromAdmin = "WIMCA2021@wimca.ng";
        $SubjectAdmin = "NEW REGISTRATION ALERT: New registration for WIMCA 2021";
        $messageAdmin  = '<html><body>';
        $messageAdmin .= '<img src="https://ik.imagekit.io/nga4iqewcs4/wimca2021_cqYL_K3tR9P?updatedAt=1632814361845" />';
        $messageAdmin .= "<div style='padding: 20px; border-radius: 5px; border: 1px solid #800080; background-color: #D8BFD8' width='600px'> <strong>A new participant just registered for WIMCA 2021. See registration details belo:w</stong></div>";
        $messageAdmin .= "<p></p>";
        $messageAdmin .= '<table rules="all" style="border-color:  #A020F0" cellpadding="10" width="600px">';
        $messageAdmin .= "<tr><td><strong>Name</strong> </td><td>" . strip_tags($_POST['firstName']) . ' ' . strip_tags($_POST['lastName']) . "</td></tr>";
        $messageAdmin .= "<tr><td><strong>Organisation </strong> </td><td>" . strip_tags($_POST['organisation']) . "</td></tr>";
        $messageAdmin .= "<tr><td><strong>Designation </strong> </td><td>" . strip_tags($_POST['designation']) . "</td></tr>";
        $messageAdmin .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
        $messageAdmin .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['mobileNumber']) . "</td></tr>";
        $messageAdmin .= "<tr><td><strong>How did you hear about this?</strong> </td><td>" . strip_tags($_POST['source']). "</td></tr>";
        $messageAdmin .= "</table>";
        $messageAdmin .= "</body></html>";
      
        $headersAdmin = "From: " . $EmailFromAdmin . "\r\n";
        $headersAdmin .= "Reply-To: ". strip_tags($EmailFromAdmin) . "\r\n";
        $headersAdmin .= "MIME-Version: 1.0\r\n";
        $headersAdmin .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
       mail($toAdmin, $SubjectAdmin, $messageAdmin, $headersAdmin); 
    }


 ?>
      
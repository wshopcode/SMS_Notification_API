
<?php

require __DIR__ . '/vendor/autoload.php';

if(isset($_POST['mobile']) && isset($_POST['msg'])){

    
    // Your Account SID and Auth Token from twilio.com/console
    $account_sid = 'YOUR-TWILIO-SID-HERE';
    $auth_token = 'YOUR-AUTH-TOKEN-HERE';
    // In production, these should be environment variables. E.g.:
    // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
    
    // A Twilio number you own with SMS capabilities
    $twilio_number = "YOUR-TWILIO-NUMBER-HERE";
    
    $client = new Twilio\Rest\Client($account_sid, $auth_token);
    $message = $client->messages->create(
        // Where to send a text message (your cell phone?)
        $_POST['mobile'],
        array(
            'from' => $twilio_number,
            'body' => $_POST['msg']
        )

    );

    if($message){
        echo "Message sent succesfully!";
    }else{
        echo 'Error! Message not sent!';
    }
}

?>

<h2>Sending SMS using twilio API<h2>

<form method= "post" action="#">
    Enter Mobile Number:<br><br>
    <input type="text" placeholder = "Mobile Number" name ="mobile"><br><br>

    Enter Message:<br><br>
    <textarea placeholder= "Message" name= "msg"></textarea><br><br>

    <input type="submit" value="Submit">
<form>


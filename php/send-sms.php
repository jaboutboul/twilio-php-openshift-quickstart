<?php
    require 'twilio-php/Services/Twilio.php';
    require 'credentials.php';

    // retrieve the user's phone number from the Javascript POST request 
    $toNumber = $_POST['phone_number'];

    // instantiate a new REST API helper object, provided by twilio-php
    $client = new Services_Twilio($ACCOUNT_SID, $AUTH_TOKEN);

    // compose the message that the recipient will receive on their handset
    $messageBody = "Congratulations! You've successfully configured Twilio on OpenShift. Happy Hacking";

    // attempt a REST API request to Twilio. For simplicity, there is no error handling.
    // failure will result in an HTTP 500 error code being returned to the Javascript client.
    $client->account->sms_messages->create($TWILIO_NUMBER, $toNumber, $messageBody);
?>

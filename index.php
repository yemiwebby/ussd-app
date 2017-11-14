
<?php
        #We obtain the data which is contained in the post url on our server.

        // $text=$_GET['USSD_STRING'];
        // $phonenumber=$_GET['MSISDN'];
        // $serviceCode=$_GET['serviceCode'];


        // $level = explode("*", $text);
        // if (isset($text)) {
   

        // if ( $text == "" ) {
        //     $response="CON Welcome to the registration portal.\nPlease enter you full name";
        // }

        // if(isset($level[0]) && $level[0]!="" && !isset($level[1])){

        //   $response="CON Hi ".$level[0].", enter your ward name";
             
        // }
        // else if(isset($level[1]) && $level[1]!="" && !isset($level[2])){
        //         $response="CON Please enter you national ID number\n"; 

        // }
        // else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
        //     //Save data to database
        //     $data=array(
        //         'phonenumber'=>$phonenumber,
        //         'fullname' =>$level[0],
        //         'electoral_ward' => $level[1],
        //         'national_id'=>$level[2]
        //         );

            

    //         $response="END Thank you ".$level[0]." for registering.\nWe will keep you updated"; 
    // }

    //     header('Content-type: text/plain');
    //     echo $response;

    // }

?>


<?php
// Reads the variables sent via POST from our gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
if ( $text == "" ) {
     // This is the first request. Note how we start the response with CON
     $response  = "CON What would you want to check \n";
     $response .= "1. My Account \n";
     $response .= "2. My phone number";
}
else if ( $text == "1" ) {
  // Business logic for first level response
  $response = "CON Choose account information you want to view \n";
  $response .= "1. Account number \n";
  $response .= "2. Account balance";
  
 }
 else if($text == "2") {
  // Business logic for first level response
  // This is a terminal request. Note how we start the response with END
  $response = "END Your phone number is $phoneNumber";
 }
 else if($text == "1*1") {
  // This is a second level response where the user selected 1 in the first instance
  $accountNumber  = "ACC1001";
  // This is a terminal request. Note how we start the response with END
  $response = "END Your account number is $accountNumber";
 }
    
 else if ( $text == "1*2" ) {
  
     // This is a second level response where the user selected 1 in the first instance
     $balance  = "NGN 10,000";
     // This is a terminal request. Note how we start the response with END
     $response = "END Your balance is $balance";
}
// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;
// DONE!!!
?>


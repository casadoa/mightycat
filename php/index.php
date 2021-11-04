
<?php
$user_name = "";
$name_error = "";
$user_number = "";
$number_error = "";
$user_address = "";
$address_error = "";
$user_city = "";
$city_error = "";
$user_state = "";
$state_error = "";
$pest = "";
$pest_error = "";
$comment = "";
$form_message = "";
$number_message = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $user_name = $_POST["name"];

  if(!filter_var($user_name, FILTER_SANITIZE_EMAIL)){
    $name_error = "* This is an invalid NAME.";
    $form_message = "Please retry and submit your form again.";
  } else {
    $form_message = "Thank you for your submission.";
  }

  $user_number = $_POST["number"];
  $pattern = '/^[(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4}$/';
  if(preg_match($pattern, $user_number) !== 1){
    $number_error = "Please enter a valid phone number so we can further assist you.";
  } else{
        $number_message = "\n" . ucfirst($user_name). " you will receive a call to go over your pest problem.";
    } 
  

  $user_address = $_POST["address"];
  if(!filter_var($user_address, FILTER_SANITIZE_EMAIL)){
      $address_error = "Please enter a valid address.";
  } else {
      $form_message = "Thank you for your submission";
  }

  $user_city = $_POST["city"];
  $user_state = $_POST["state"];
  if($user_city){
    $form_message = "Thank you for your submission";
  } else {
    $city_error = "Please select a city";
  }
  
  if(strlen($user_state) === 8 || strlen($user_state) === 10){
    $form_message = "Thank you for your submission";
  } else {
    $state_error = "Please select One state";
  }
  
  $comment = $_POST["comment"];
  if($comment === "A small comment about your problem."){
    $comment = "No comment written.";
  }
  
  $pest = $_POST["pest"];
  if(!$pest){
    $pest_error = "NO pests selected doesn't look like you have any issuses :)";
  } else { 
    $pest = implode(", ", $pest);
  }
  
  if($name_error || $number_error || $state_error || $city_error){
    $form_message = "Please revise and submit the form again.";
    $number_message = "";
  }
  
   $to = "andrescasado@yahoo.com";
  $subject = "Extermination";
  $body = "";
  $body .= "From: " . ucfirst($user_name) . "\r\n";
  $body .= "\r\nNumber: " . $user_number . "\r\n";
  $body .= "\r\nAddress: " . $user_address . "  " . $user_city . ", " . $user_state . "\r\n";
  $body .= "\r\nPest problem: " . $pest . "\r\n\r\n" . $comment;
  $headers = 'MIME-VERSION: 1.0' . "\r\n";
  $headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
  $headers .= 'To: Andres: <mighaoqf@mightycatinc.com>, Andres: <casado.a05@gmail.com>' . "\r\n";
  
  if(mail($to, $subject, $body, $headers) !== true){
      
      $form_message = "DID NOT send";
      die('Fail to send');
  } else {
      $form_message = "THANKS FOR THE SUBMISSION!!";
      mail($to, $subject, $body, $headers);
  }

}
/*
$to = "email1@localhost";

$subject = "Extermination";

$message = "$user_name \n$user_number\n $user_address\n $pest\n";

$headers = "From: The Sender $user_name\r\n";
$headers .= "Reply-To: andres.casado@yahoo.com\r\n";
$headers .= "Content-type: text/html\r\n";

**********************************************************

 $to = "mighaoqf@mightycatinc.com";
  $subject = "Extermination";
  $message = "$name \n$number\n $address\n $state\n $pests\n";

  $headers = "From: The Sender Name $name\r\n";
  $txt = "You have received an e-mail from " . "\n\n" . $message;
  $headers .= "Content-type: text/html\r\n";
  mail($to, $subject, $txt, $headers);
  header("Location: index.php?mailsend");
*/

/*
if(isset($_POST["submit"])){ 
  $to = "andrescasado@yahoo.com";
  $subject = "Extermination";
  $body = "";
  $body .= "From: " . $user_name . "\r\n";
  $body .= "\r\nNumber: " . $user_number . "\r\n";
  $body .= "\r\nAddress: " . $user_address . "  " . $user_city . "  ," . $user_state . "\r\n";
  $body .= "\r\nPest problem: " . $pest . "\r\n";
  $headers = 'MIME-VERSION: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'To: Andres: <mighaoqf@mightycatinc.com>' . "\r\n";
  
  if(mail($to, $subject, $body, $headers) !== true){
      die('Fail to send');
  } else {
    mail($to, $subject, $body, $headers);
  }
}
*/

/*if(mail($to, $subject, $message, $headers)){
  $form_message = "Email sent!";
} else {
  $form_message = "NO EMAIL YET KEEP WORKING ON IT!";
}
*/
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href ="../cstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:500,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Proza+Libre:400,500,700" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda&family=Oxygen:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">

  
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>
    <body>
         <!-- Header -->

<header class="container">
    <!-- Navigation Bar -->
      <nav role="navigation" class="nav">
        <ul class="navigate">
         <li><a href="../index.html">Home</a></li>  
         <li> / </li>
         <li><a href="../datasheets.html">Safety Data Sheets</a></li>
       </ul>
     </nav>
    <div>
      <h1 class="name">Mighty Cat Inc.</h1>
      <h2 class="name">Pest Control</h2>
    </div>
    <div class="bg_for_logo" id="bg_logo">
      <img class="bg_logo" src="../mclogo-3.png" alt="Mighty Cat Logo"/>
    </div>
 </header>
<main>
<h1 class="banner">Contact</h1>
<form id="myForm" class="scheduleForm" method="post" action="index.php">
    <h2>Schedule a visit:</h2>

    <label for="name">Name:</label> <br>
    <input type="text" name="name" value="<?= $user_name; ?>" minlength="2" maxlength="20">
        <span class="error"><?= $name_error; ?></span>
    <br><br>

    <label for="number">Phone Number:</label> <br>
    <input type="text" name="number" value="<?= $user_number;?>">
        <span class="error"><?= $number_error;?></span>
    <br><br>

    <label for="address">Address:</label> <br>
    <input type="text" name="address" value="<?= $user_address;?>">
        <span class="error"><?= $address_error;?></span>
    <br><br>

    <label for="city">City:</label> <br>
    <select class="city" name="city" value="<?= $user_city;?>">
      <option value="Manhattan">Manhattan</option>
      <option value="Brooklyn">Brooklyn</option>
      <option value="Queens">Queens</option>
      <option value="Bronx">Bronx</option>
      <option value="Clifton">Clifton</option>
      <option value="Newark">Newark</option>
      <option value="Teaneck">Teaneck</option>
      <option value="Union">Union</option>
      <option value="East Orange">East Orange</option>
      <option value="West Orange">West Orange</option>
      <option value="Irvington">Irvington</option>
      <option value="West New York">West New York</option>
      <option value="Garfield">Garfield</option>
      <option value="Montclair">Montclair</option>
      <option value="North Bergen">North Bergen</option>
      <option value="Paterson">Paterson</option>
      <option value="Livingston">Livingston</option>
      <option value="Other">If other please type in message</option>
    </select>
    <span class="error"><?= $city_error;?></span>
      
    <br><br>

    <label for="state">State:</label> <br>
      <input type="checkbox" class="state" name="state[]" value="New York">New York
      <input type="checkbox" class="state" name="state[]"  value="New Jersey">New Jersey
    <span class="error"><?= $state_error;?></span>
    <br><br>  

    <label class="title" for="mice">Type of Pest(s):</label><br>
      <input class="pest" name="pest[]" type="checkbox" value="mice">Mice
      <input class="pest" name="pest[]" type="checkbox" value="roach">Roach
      <input class="pest" name="pest[]" type="checkbox" value="ants">Ants
      <input class="pest" name="pest[]" type="checkbox" value="rats">Rats
      <input class="pest" name="pest[]" type="checkbox" value="bedbugs">Bed Bugs
      <input class="pest" name="pest[]" type="checkbox" value="other">Other
    <br><br>

    <label for="Comment">Comment:</label><br>
      <input type="text" name="comment" value="A small comment about your problem." size="50">
    <br><br>
 
    <input id="sub" type="submit" value="Submit">
    </form>
    <p class="final"><?= $form_message; ?></p>
    <p class="final"><?= $number_message; ?> </p>

<!--    
  <p><?= $user_name;?></p>
  <p><?= $user_number; ?></p>  
  <p><?= $user_address; ?></p>
  <p><?= $user_city; ?></p>
  <p><?= $user_state; ?></p>
  <p><?= $pest;?></p>
  <p><?= $comment; ?></p>
-->
  <a class="reset" href="index.php">Reset</a>
</main>

 <!-- Contact List-->
<footer>
  <article class="contact">
    <ul>
      <li>Mario Maura</li>
      <li>Cell: 646-246-7899</li>
      <li>Email: mightycatinc@gmail.com</li>
      <li>Mail: P.O. Box 104 Clifton NJ, 07011 </li>
    </ul>
  </article>
  
  <script type="text/javascript"> //<![CDATA[
  var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
  document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]></script>
<script language="JavaScript" type="text/javascript">
  TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_md_167x42.png", "POSDV", "none");
</script>
</footer>

  </body>
</html>
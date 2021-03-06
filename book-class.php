<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/6971a76c77.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="booking.css" />

    <title>Brow World | Book Now</title>
  </head>
  <body>
  <?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'C:\xampp\htdocs\mail\vendor\autoload.php';
  /* Set the script time zone to UTC. */
date_default_timezone_set('Africa/Nairobi');

$nameErr = $emailErr = $selectClassErr = $phoneErr = $classTypeErr= "";
$name = $email = $selectclass  = $phone = $classtype = "";
extract( $_POST );
if (isset($_POST['submit'])){
if (empty($_POST["name"])) {
  $nameErr = "Name is required";
} else {
  $name = $_POST["name"];
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
   }
}

if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} else {
  $email = ($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}

if (empty($_POST["selectclass"])) {
  $selectClassErr = "Please select a class.";
} else {
  $selectclass = $_POST["selectclass"];
}
if (empty($_POST["phone"])) {
  $phoneErr = "Please input your phone number";
} else {
  $phone = $_POST["phone"];
}
if (empty($_POST["classtype"])) {
    $classTypeErr = "Please indicate your preferred class type";
  } else {
    $classtype = $_POST["classtype"];
  }

$mail = new PHPMailer(TRUE);
/* Open the try/catch block. */
try {
    /* Set the mail sender. */
    $mail->setFrom('jokerarkham769@gmail.com', 'Rush');
 
    /* Add a recipient. */
    $mail->addAddress('0701648990@sms.clicksend.com', 'Dan');

    /*Add a blind Carbon Copy*/
    $mail->addBCC('rmounza@gmail.com', 'Luke Skywalker');

 
    /* Set the subject. */
    $mail->Subject = "Brow World - $selectclass\n";
 
    /* Set the mail message body. */
    $mail->Body = "Client Name is $name.\nClient's phone number is $phone and email is $email.\n$name wants to sign up for a $selectclass class.";
     
    /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.gmail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   /* Set the SMTP port. */
   $mail->Port = 587;
   $mail->Username = 'jokerarkham769@gmail.com';
   /*App Password*/
   $mail->Password = 'qoewwqsvuzozrpba';
 
    /* Finally send the mail. */
    $mail->send();
 }
 catch (Exception $e)
 {
    /* PHPMailer exception. */
    echo $e->errorMessage();
 }
 catch (\Exception $e)
 {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    echo $e->getMessage();
 }
}
?>
<h1>Sign Up For a Class Now!</h1>
<div class="container-main">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="form1">
              <div class="form-group">
                <label for="name" class="col-form-label"
                  >Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="name"
                  placeholder="Jane Doe"
                />
                <span class="error"><?php echo $nameErr;?></span>
              </div>
              <div class="form-group">
                <label for="phone" class="col-form-label"
                  >Phone Number</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="phone"
                  placeholder="0701111222"
                />
                <span class="error"><?php echo $phoneErr;?></span>
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="name@example.com"
                />
                <span class="error"><?php echo $emailErr;?></span>
              </div>
              <div class="form-group">
                <label for="selectclass" class="col-form-label"
                  >Select a Class</label
                >
                <select class="form-control" name="selectclass">
                  <option>Microblading</option>
                  <option>Ombre Brows</option>
                  <option>Combo Brows</option>
                  <option>Dante's Signature</option>
                </select>
                <span class="error"><?php echo $selectClassErr;?></span>
              </div>
              <div class="form-group">
                <label for="classtype" class="col-form-label"
                  >Choose Private/Group Class</label
                >
                <select class="form-control" name="classtype">
                  <option>Private - Ksh 200,000</option>
                  <option>Group - Ksh 150,000</option>
                </select>
                <span class="error"><?php echo $classTypeErr;?></span>
              </div>
              <input
              type="submit"
              name="submit"
              id="submit"
              class="btn btn-primary"
              value="Submit"
            />
            </form>
            <p>After filling the form, please ensure to pay the deposit of Ksh 50,000 to our Till Number 939191 (Amaris Beauty) inorder for your seat to be reserved. We will notify you via text/email with more information.</p>
            <h2 style="margin-top: 20px;">If you don't hear from us in 24 hours please call 0711700300.</h2> 
        </div>
       
      </div>
    </div>
</div>
<script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <!-- This is the main stylesheet -->
    <link rel="stylesheet" href="mains.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/6971a76c77.js"
      crossorigin="anonymous"
    ></script>
    <title>Brow World | Contact Us Details</title>
    <meta
      name="description"
      content="Contact us
    Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.
    "
    />
  </head>

  <body>
  <div class="topnavbar">
      <input type="checkbox" id="menu-icon-input" />
      <label id="menu-icon" for="menu-icon-input">&#9776;</label>
      <div class="nav-items">
        <ul>
          <li>
            <a href="index.html">Brow World- The Microblading Academy</a>
          </li>
          <li><a href="courses.html">Classes</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="about-us.html">About</a></li>
          <li><a class="active" href="contact.php">Contacts</a></li>
        </ul>
      </div>
    </div>
    <div class="main2">
      <h1 style="margin: 0;">Contact Us</h1>
      <p>
        Do you have any feedback? Please do not hesitate to contact us
        directly. Our team will get back to you within a matter of hours to
        help you.
      </p>

      <?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'C:\xampp\htdocs\mail\vendor\autoload.php';
  /* Set the script time zone to UTC. */
date_default_timezone_set('Africa/Nairobi');

$nameErr = $emailErr = $phoneErr= $feedbackErr = "";
$name = $email= $phone = $feedback= "";
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
if (empty($_POST["phone"])) {
  $phoneErr = "Please input your phone number";
} else {
  $phone = $_POST["phone"];
}
if (empty($_POST["feedback"])) {
    $feedbackErr = "Please input your feedback";
  } else {
    $feedback = $_POST["feedback"];
  }

$mail = new PHPMailer(TRUE);
/* Open the try/catch block. */
try {
    /* Set the mail sender. */
    $mail->setFrom('jokerarkham769@gmail.com', 'Brow World');
 
    /* Add a recipient. */
    $mail->addAddress('rmounza@gmail.com', 'Dan');
 
    /* Set the subject. */
    $mail->Subject = "Brow World - Customer Feedback\n";
 
    /* Set the mail message body. */
    $mail->Body = "Client Name is $name.\nClient's phone number is $phone and email is $email.\n$feedback";
     
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
                <label for="feedback" class="col-form-label"
                  >Input your feedback here</label
                >
                <textarea name="feedback" id="feedback" cols="30" rows="10"></textarea>
                <span class="error"><?php echo $feedbackErr;?></span>
              </div>
              <input
              type="submit"
              name="submit"
              id="submit"
              class="btn btn-primary"
              value="Submit"
            />
            </form>
           
            <h2 style="margin-top: 20px;">For prompt feedback don't hesitate to call us on 0704985370 and 0711700300. Alternatively, you could come by our offices. We are located at Diamond Plaza 4th floor</h2> 
        </div>
    </div>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8562280908204!2d36.81619371475378!3d-1.2582824990822334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f171b74f9ba57%3A0x11a8c077b37bd655!2sDiamond%20Plaza%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1596033906029!5m2!1sen!2ske"
      width="100%"
      height="450"
      frameborder="0"
      style="border: 0;"
      allowfullscreen=""
      aria-hidden="false"
      tabindex="0"
    ></iframe>
    <script
      src="https://kit.fontawesome.com/6971a76c77.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

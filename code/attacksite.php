<!-- start session for counter session variable (stores value across multiple pages) -->
<?php
session_start();
if (!isset($_SESSION["state"])) {
  $_SESSION["state"]=0;
}
?>

<!-- HTML style code for target webpage -->
<html>
  <style>
    #text {
      text-align: center;
    }

    h1 {
      text-align:center;
    }

    button {
      position: relative;
      margin-top:5%;
      margin-left:46%;
      padding: 10px 20px;
    }

     #image {
       position: relative;
       display: block;
       margin-left: 40%;
       margin-top: 4%;
       width: auto;
       height: auto;
     }
  </style>
  <head>
    <title>Target Website</title>
  </head>

  <body>
    <h1>Thank You!</h1>
    <div id="text">
    <!-- display the true value of the counter (money to attacker) -->
    <?php
    echo "Thank you for sending $".$_SESSION["state"]." to me!";
    $_SESSION["state"]+=1;
    ?>
    <br><br><br>
    This website is a demonstration of a clickjacking attack for CS331. Please follow this <a href="http://cs.williams.edu/~24fka1/decoy.php">link</a> for the other part.

    </div>
    <div id="image">
      <img src="dbarowy.jpg" height="30%" width="30%">
    </div>

    <!-- target button -->
    <button type="button" id="targetbutton" onClick="window.location.reload()">More Money!</button>

  </body>
</html>

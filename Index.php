<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> <!-- family-font-->
    <link rel="stylesheet" type="text/css" href="Vue/CSS/Index.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <meta http-equiv="refresh" content="0.1; Home.php">

    <title>Jacques Tellier</title>

  </head>

  <body style="margin: 0;">

    <div id="intro">
      <intro class="introANI1">Jacques</intro>
      <intro class="introANI1">Tellier</intro>
    </div>

    <div id="intro2">
      <intro class="introANI2">Jacques</intro>
      <intro class="introANI2">Tellier</intro>
    </div>

    <script>
      window.onload = function()
      {
        setTimeout(function()
        {
          document.getElementById("intro").style.display = "none";
        }, 1500);
        setTimeout(function()
        {
          document.getElementById("intro2").style.display = "block";
        }, 1500);
      }
    </script>

  </body>
</html>

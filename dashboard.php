<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style1.css"/>
    <link rel="icon" type="image/x-icon" href="/BUS.jpg">
</head>
<body>
    <!-- <div class="container">
    <h1><p><b><i>Teachers</i></b></p></h1>
        <p>Teacher Name:</p>
        <p>Application:</p>

        <p></p> -->
<form action="/action_page.php">
  <h1><p><b><i>Teachers</i></b></p></h1>
  <br>
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <br>
  <label for="application">Application:</label><br>
  <input type="text" id="application" name="application"><br><br>
  <br>
  <input type="submit" value="Submit">
  <br>
  <p align="right"><a href="logout.php">Logout</a></p>
</form> 

        
        
    <!-- </div> -->
</body>
</html>
<?php
  $servername = "localhost";
  $username = "user-validate";
  $password = 'Ican$earcH';
  $database = 'test1';
// Create connection
  $conn =  new mysqli($servername, $username, $password,$database) or die(mysql_error());

// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

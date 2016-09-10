<?php
  $servername = "localhost";
  $username = "user-input";
  $password = 'Pa$$w0rD';
  $database = 'test1';
// Create connection
  $conn =  new mysqli($servername, $username, $password,$database) or die(mysql_error());

// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

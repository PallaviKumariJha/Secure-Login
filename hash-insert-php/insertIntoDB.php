<?php
include 'include/connect-insert.php';
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //sanitizing
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);

  //hashing password
  $hashed_password= hash('sha256', $password);

  $query = "INSERT INTO myLoginHashed VALUES('$username', '$hashed_password')";
  $result = $conn->query($query);
  $response = (int)$result;
  //echo json_encode((int)$result);
  echo json_encode($response*10+3);
}


/*
$username = 'bob';
$password = 'password';

//hashing password
$hashed_password= hash('sha256', $password);
echo $hashed_password;
echo "<br/>";

$query = "INSERT INTO myLoginHashed VALUES('$username', '$hashed_password')";
$result = $conn->query($query);

echo $result;
*/
?>

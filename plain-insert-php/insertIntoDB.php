<?php
include 'include/connect-insert.php';
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //sanitizing
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);

  $query = "INSERT INTO myLoginPlain VALUES('$username', '$password')";
  $result = $conn->query($query);
  $response = (int)$result;
  echo json_encode($response*10+1);
  //echo json_encode("plainPHP");

}
else{
  echo json_encode(-1);
}
?>

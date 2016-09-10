<?php
include 'include/connect-select.php';
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //sanitizing
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);

  //hashing password
  $hashed_password= hash('sha256', $password);
  $query = "SELECT * FROM  myLoginHashed WHERE(name='$username' AND password='$hashed_password')";

  $result = $conn->query($query);

  if($result){
    $row_cnt = $result->num_rows;
    echo json_encode(((int)$row_cnt));
  }
  else{
    echo json_encode((-1));
  }
}

?>

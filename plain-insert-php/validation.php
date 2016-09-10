<?php
include 'include/connect-select.php';
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //sanitizing
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);
  $query = "SELECT * FROM myLoginPlain WHERE (name='$username' AND passwd='$password');";
  $result = $conn->query($query);
  if($result){
    $row_cnt = $result->num_rows;
    echo json_encode((int)$row_cnt);
  }
  else{
    echo json_encode(-1);
  }
}


/*

$username = 'user';
$password = 'password';
//sanitizing
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);
$query = "SELECT * FROM myLoginPlain WHERE (name='$username' AND passwd='$password');";
$result = $conn->query($query);
if($result){
  $row_cnt = $result->num_rows;
  echo json_encode((int)$row_cnt);
}
else{
  echo "Error in SQL";
}
*/
?>

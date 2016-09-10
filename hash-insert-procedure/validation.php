<?php
include 'include/connect-select.php';
  session_start();

  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username']; //fetch username from POST
    $password = $_POST['password']; //fetch password from POST

    //sanitizing
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $query = "SELECT(matchHash('$username', '$password'))";  //form a SQL query
    $result = $conn->query($query); // execute the query
    while($row = mysqli_fetch_array($result)){
      $response = (int)$row[0];
      echo json_encode($response);
    }
  }

?>

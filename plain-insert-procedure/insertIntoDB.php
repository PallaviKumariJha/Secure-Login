<?php
  include 'include/connect-insert.php';
  session_start();

  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username']; //fetch username from POST
    $password = $_POST['password']; //fetch password from POST

    //sanitizing
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);


    $query = "SELECT(plainAdd('$username', '$password'))";  //form a SQL query
    $result = $conn->query($query); // execute the query
    while($row = mysqli_fetch_array($result)){
      $sqlResult = (int)$row[0];
      //echo json_encode($response*10+2); //this will return 2 : for testing purpose
      echo json_encode($sqlResult*10+2);
    }
  }

?>

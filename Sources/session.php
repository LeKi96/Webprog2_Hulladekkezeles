<?php
  $host = 'localhost';
  $dbname = 'mesterember_app_users'; 
  $username = 'root';
  $password = '';
  session_start();

  if (isset($_SESSION["user_id"])) {
      
    $mysqli = new mysqli($host, $username, $password, $dbname);
      
      $sql = "SELECT * FROM user
              WHERE id = {$_SESSION["user_id"]}";
              
      $result = $mysqli->query($sql);
      
      $user = $result->fetch_assoc();
  }

?>
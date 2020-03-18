<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$pro = $_POST['pro'];
$reason = $_POST['reason'];
if (!empty($fname) || !empty($lname) || !empty($email) || !empty($phone)  || !empty($country) || !empty($pro) || !empty($reason)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "workshop";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
     $INSERT = "INSERT Into user (firstname,lastname,email,phone,country,pro,reason) values(?, ?, ?, ?, ?, ?, ?)";
    
  
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisss", $fname, $lname, $email,$phone,$country,$pro,$reason);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } 
     $stmt->close();
     $conn->close();
    }
 else {
 echo "All field are required";
 die();
}
?>
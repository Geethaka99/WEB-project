<?php

include 'database.php';
 
try{

$name =$_POST['name'];
$email =$_POST['email'];
$contact =$_POST['contact'];
$purpose =$_POST['purpose'];
$from_date =$_POST['fromdate'];
$to_date =$_POST['todate'];
$days =$_POST['days'];
$rate =$_POST['rate'];
$amount =$_POST['amount'];




  $query = "INSERT INTO booking set name=:name, email=:email, contact=:contact,purpose=:purpose,from_date=:from_date,to_date=:to_date,days=:days,rate=:rate,amount=:amount";
  
  $stmt = $conn->prepare($query);
 

  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':contact', $contact);
  $stmt->bindParam(':purpose', $purpose);
  $stmt->bindParam(':from_date', $from_date);
  $stmt->bindParam(':to_date', $to_date);
  $stmt->bindParam(':days', $days);
  $stmt->bindParam(':rate', $rate);
  $stmt->bindParam(':amount', $amount);
 
// Execute the query
if($stmt->execute()){
  echo "<div class='alert alert-success'>Record was saved.</div>";
  header('Location: bookingdata.php?action=saved');
}else{
  echo "<div class='alert alert-danger'>Unable to save record.</div>";
}


}catch(PDOException $exception){
  die('ERROR: ' . $exception->getMessage());
}





?>
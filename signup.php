<?php


	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "hoteldb";
	//create connection
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
	if ($conn->connect_error)
	 {
		die("Connection failed".$conn->connect_error);
	 }
	 else 
	 {
	 	echo"Connection Succefull";
	 	
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$DOBy = $_REQUEST['year'];
		$DOBm = $_REQUEST['month'];
		$DOBd = $_REQUEST['date'];
		$gender = $_REQUEST['gender'];
		$country = $_REQUEST['country'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
		$password = $_REQUEST['pwd'];

		$INSERT = "INSERT Into signup (fname,lname,doby,dobm,dobd,gender,country,email,phone,password) values ('$fname','$lname','$DOBy','$DOBm','$DOBd','$gender','$country','$email','$phone','$password');";

		if($conn->query($INSERT) == true)
        {
            echo"Record inserted Succefully";
        }
        else
        {
            echo"Signup failed";
        }	
        
	}

?>
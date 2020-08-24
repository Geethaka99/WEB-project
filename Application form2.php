<?php
$First_Name = $_POST["First_Name"];
$Last_Name = $_POST["Last_Name"];
$Date_of_Birth = $_POST["Date_of_Birth"];
$Gender = $_POST["Gender"];
$Country = $_POST["Country"];
$E_Mail = $_POST["E_Mail"];
$Phone = $_POST["Phone"];
$Password = $_POST["Password"];
if (!empty($First_Name) || !empty($Last_Name) || !empty($Date_of_Birth) || !empty($Gender) || !empty($Country) || !empty($E_Mail) || !empty($Phone) || !empty($Password)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "Application form";
	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	if (mysql_connect_error()) {
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	} else {
		$SELECT = "SELECT email From register Where email = ? Limit_1";
		$INSERT = "INSERT Into register (First_Name, Last_Name, Date_of_Birth, Gender, Country, E_Mail, Phone, Password) values (?, ?, ?, ?, ?, ?, ?, ?)";
		//Prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $E_Mail);
		$stmt->execute();
		$stmt->bind_result($E_Mail);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		if ($rnum==0) {
			$stmt->close();
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssssii", $First_Name, $Last_Name, $Date_of_Birth, $Gender, $Country, $E_Mail, $Phone, $Password);
			$stmt->execute();
			echo "New record inserted sucessfully";
		} else {
			echo "Someone already register using this email";
		}
		$stmt->close();
		$conn->close();
	}
	
} else {
	echo "All field are required";
	die();
}

?>
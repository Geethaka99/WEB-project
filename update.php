<html>
<head>
	<style>
		h1{
			font-size:44p;
			color:darkred;
		}
		input{
			border-radius: 10px;
			width: 250px;
			height: 35px;
			text-indent: 5px;
		}
		input:focus{
			outline: none;
		}
	    fieldset{
			width: 50%;
			height: 690px;
			background-color: #00ff00;
			border-radius: 5px;
			outline: none;
		}
		table{
			font-size:22px;
		}
		td{
			line-height: 50px;
	    }
		 input[type="submit"]{
			width: 120px;
			height: 30px;
			background-color: green;
		}
		input[type="submit"]hover{
			background-color:darkgreen ;

		}
		input[type="reset"]{
			width: 120px;
			height: 30px;
			background-color: green;
		}
		input[type="reset"]hover{
			background-color: darkgreen;
		}
		</style>
<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>

					<?php
						// get passed parameter value, in this case, the record ID
						// isset() is a PHP function used to verify if a value is there or not
						$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
						
						//include database connection
						include 'database.php';
						
						// read current record's data
						try {
							// prepare select query
							$query = "SELECT id, name, email, contact,purpose,from_date,to_date,days,rate,amount FROM booking WHERE id = ?";
							$stmt = $conn->prepare( $query );
							
							// this is the first question mark
							$stmt->bindParam(1, $id);
							
							// execute our query
							$stmt->execute();
							
							// store retrieved row to a variable
							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							
							// values to fill up our form

							$name =$row['name'];
							$email =$row['email'];
							$contact =$row['contact'];
							$purpose =$row['purpose'];
							$from_date =$row['from_date'];
							$to_date =$row['to_date'];
							$days =$row['days'];
							$rate =$row['rate'];
							$amount =$row['amount'];
						}
						
						// show error
						catch(PDOException $exception){
							die('ERROR: ' . $exception->getMessage());
						}
					?>

						<?php
						
						// check if form was submitted
						if($_POST){
							
							try{
							
								// write update query
								// in this case, it seemed like we have so many fields to pass and 
								// it is better to label them and not use question marks
								$query = "UPDATE booking 
											set name=:name, email=:email, contact=:contact,purpose=:purpose,from_date=:from_date,to_date=:to_date,days=:days,rate=:rate,amount=:amount 
											WHERE id = :id";
						
								// prepare query for excecution
								$stmt = $conn->prepare($query);
						
								// posted values
								$name =$_POST['name'];
								$email =$_POST['email'];
								$contact =$_POST['contact'];
								$purpose =$_POST['purpose'];
								$from_date =$_POST['fromdate'];
								$to_date =$_POST['todate'];
								$days =$_POST['days'];
								$rate =$_POST['rate'];
								$amount =$_POST['amount'];
						
								// bind the parameters

								$stmt->bindParam(':name', $name);
								$stmt->bindParam(':email', $email);
								$stmt->bindParam(':contact', $contact);
								$stmt->bindParam(':purpose', $purpose);
								$stmt->bindParam(':from_date', $from_date);
								$stmt->bindParam(':to_date', $to_date);
								$stmt->bindParam(':days', $days);
								$stmt->bindParam(':rate', $rate);
								$stmt->bindParam(':amount', $amount);
								$stmt->bindParam(':id', $id);
								
								// Execute the query
								if($stmt->execute()){
									echo "<div class='alert alert-success'>Record was updated.</div>";
									header('Location: bookingdata.php?action=updated');
								}else{
									echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
								}
								
							}
							
							// show errors
							catch(PDOException $exception){
								die('ERROR: ' . $exception->getMessage());
							}
						}
						?>





	<center>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
			<fieldset>
				<table>
					<h1>Update Booking</h1>

					<tr><th>Name</th>
						<td>:</td>
						<td><input type="text" name="name" id="name1" value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" placeholder="Enter Your Name"></td>
					</tr>
					<th>Email</th>
						<td>:</td>
						<td><input type="email" name="email" id="email1" value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>" placeholder="Enter Your Email"></td>
					</tr>
					<th>Contact No</th>
						<td>:</td>
						<td><input type="number" name="contact" id="number1" value="<?php echo htmlspecialchars($contact, ENT_QUOTES);  ?>" placeholder="Enter Your Mobile no"></td>
					</tr>
						<th>Purpose</th>
						<td>:</td>
						<td><input type="text" name="purpose" id="purpose1" value="<?php echo htmlspecialchars($purpose, ENT_QUOTES);  ?>" placeholder="Enter Your Purpose"></td>
					</tr>
					<th>From Date</th>
						<td>:</td>
						<td><input type="date" name="fromdate" value="<?php echo htmlspecialchars($from_date, ENT_QUOTES);  ?>" id="date1"></td>
					</tr>
					<th>To Date</th>
						<td>:</td>
						<td><input type="date" name="todate" value="<?php echo htmlspecialchars($to_date, ENT_QUOTES);  ?>" id="todate1"></td>
					</tr>
					<th>Days</th>
						<td>:</td>
						<td><input type="text" name="days" id="days1" value="<?php echo htmlspecialchars($days, ENT_QUOTES);  ?>" placeholder="Enter Days"></td>
					</tr>
					<th>Rate</th>
						<td>:</td>
						<td><input type="text" name="rate" id="rate1" value="<?php echo htmlspecialchars($rate, ENT_QUOTES);  ?>" placeholder="Enter Rate"></td>
					</tr>
					<th>Amount</th>
						<td>:</td>
						<td><input type="text" name="amount" id="amount" value="<?php echo htmlspecialchars($amount, ENT_QUOTES);  ?>" placeholder="Press Enter auto Calculator"></td>
					</tr>

				</table>
				<div style="margin-top: 40px">
					<tr>
						<td>
						<input type="submit" value="save changers" name="send" id="send1">
						</td>
						<td>
							
					    </td>
					</tr>
				</div>
					    

			</fieldset>
		</form>
	</center>
	
</body>
</html>
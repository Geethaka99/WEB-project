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

	<center>
		<form action="save.php" method="POST">
			<fieldset>
				<table>
					<h1>Booking Form</h1>
					<tr><th>Name</th>
						<td>:</td>
						<td><input type="text" name="name" id="name1" placeholder="Enter Your Name"></td>
					</tr>
					<th>Email</th>
						<td>:</td>
						<td><input type="email" name="email" id="email1" placeholder="Enter Your Email"></td>
					</tr>
					<th>Contact No</th>
						<td>:</td>
						<td><input type="number" name="contact" id="number1" placeholder="Enter Your Mobile no"></td>
					</tr>
						<th>Purpose</th>
						<td>:</td>
						<td><input type="text" name="purpose" id="purpose1" placeholder="Enter Your Purpose"></td>
					</tr>
					<th>From Date</th>
						<td>:</td>
						<td><input type="date" name="fromdate" id="date1"></td>
					</tr>
					<th>To Date</th>
						<td>:</td>
						<td><input type="date" name="todate" id="todate1"></td>
					</tr>
					<th>Days</th>
						<td>:</td>
						<td><input type="text" name="days" id="days1" placeholder="Enter Days"></td>
					</tr>
					<th>Rate</th>
						<td>:</td>
						<td><input type="text" name="rate" id="rate1" placeholder="Enter Rate"></td>
					</tr>
					<th>Amount</th>
						<td>:</td>
						<td><input type="text" name="amount" id="amount" placeholder="Press Enter auto Calculator"></td>
					</tr>

				</table>
				<div style="margin-top: 40px">
					<tr>
						<td>
							<input type="submit" value="save" name="send" id="send1">
							
						</td>
						<td>
							<input type="reset" value="Cancle" name="cancle" id="cancle1">
					    </td>
					</tr>
				</div>
					    

			</fieldset>
		</form>
	</center>
	
</body>
</html>
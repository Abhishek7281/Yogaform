<?php
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$sessiondetails = $_POST['sessiondetails'];
	$sessiontime = $_POST['sessiontime'];
	$pay = $_POST['pay'];
	$cardnumber = $_POST['cardnumber'];
	$cardcvc = $_POST['cardcvc'];


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fullname, username, email, phonenumber, password, confirmpassword,gender,age,sessiodetails,sessiontime,pay,cardnumber,cardcvc) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssisssissiii", $fullname, $username, $gender, $email, $phonenumber, $password,$confirmpassword,$gender,$age,$sessiondetails,$sessiontime,$pay,$cardnumber,$cardcvc);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
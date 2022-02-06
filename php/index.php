<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$district = $_POST['district'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$room = $_POST['room'];
	$numberperroom = $_POST['numberperroom'];
	$cost = $_POST['cost'];
	$contact_type = $_POST['contact_type'];
	$link_address='../html/index.html';

	if(!empty($name) || !empty($email) || !empty($tel) || !empty($address) || !empty($district) || !empty($state) || !empty($country) || !empty($zip) || !empty($room) || !empty($numberperroom) || !empty($cost) || !empty($contact_type)){
		$host = "127.0.0.1";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "home_for_many";
		
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else{
			$SELECT = "SELECT email FROM home_reg WHERE email = ? Limit 1";
			$INSERT =" INSERT INTO home_reg(name, email, tel, gender, address, district, state, country, zip, room, numberperroom, cost, contact_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$stmt->fetch();
			$rnum = $stmt->num_rows;

			if($rnum==0){
				$stmt->close();

				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssssssssiiiis", $name, $email, $tel, $gender, $address, $district, $state, $country, $zip, $room, $numberperroom, $cost, $contact_type);
				$stmt->execute();
				
				echo "Record had been submitted sucessfully! <a href='".$link_address."'>Back</a>";
			}

			else{
				echo "E-mail already exits! <a href='".$link_address."'>Back</a>";
			}
			$stmt->close();
			$conn->close();
		}
	}
	else{
		echo "All field are required <a href='".$link_address."'>Back</a>";
		die();
	}

?>
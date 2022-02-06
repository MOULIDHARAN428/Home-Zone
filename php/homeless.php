<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$district = $_POST['district'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$contact = $_POST['contact'];
	$comments = $_POST['comments'];

	$link_address='../html/homeless.html';

	if(!empty($name) || !empty($gender) || !empty($tel) || !empty($age) || !empty($district) || !empty($state) || !empty($country) || !empty($zip) || !empty($contact) || !empty($email)){
		$host = "127.0.0.1";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "home_for_many";
		
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else{
			$SELECT = "SELECT email FROM homeless_reg WHERE email = ? Limit 1";
			$INSERT =" INSERT INTO  homeless_reg (name, email, tel, gender, age, district, state, country, zip, contact, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
				$stmt->bind_param("ssssisssiss", $name, $email, $tel, $gender, $age, $district, $state, $country, $zip, $contact, $comments);
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
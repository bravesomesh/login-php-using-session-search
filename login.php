<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		echo "username ".$_SESSION['username'];
		//header('Location: http://localhost/somesh/login-dashboard/all_website_data.php');
	} else {
		include("config.php");		
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$sql = "SELECT id, name FROM users WHERE email='$email' and password='$pass'";
		
		if(isset($email)){
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				session_start();
				while($row = $result->fetch_assoc()){
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['name'];
				}
				$conn->close();
				header("Location: http://localhost/somesh/login-dashboard/all_website_data.php");
			} else {
				$conn->close();
			    header("Location: http://localhost/somesh/login-dashboard?login_failed='true'");
			}
		} else {
			header("Location: http://localhost/somesh/login-dashboard/");
		}	
	}
?>
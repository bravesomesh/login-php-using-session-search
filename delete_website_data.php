<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: http://localhost/somesh/login-dashboard/');
	} else {
		include("config.php");

		$website_id = $_POST['website_id'];

		$sql = "delete from website_data where website_id=$website_id";

		if(isset($website_id)) {
			if ($conn->query($sql) === TRUE) {
			    header("Location: http://localhost/somesh/login-dashboard/");
			} else {
			    echo "Error deleting record: " . $conn->error;
			}
			$conn->close();
		} else {
			    header("Location: http://localhost/somesh/login-dashboard/");
		}
	}
?>
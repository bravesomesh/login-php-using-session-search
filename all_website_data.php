<?php 
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: http://localhost/somesh/login-dashboard/');
	} else {
		include("config.php");

		$website_id = $_POST["website_id"];
		$website = $_POST["website"];
		$websiteUrl = $_POST["websiteUrl"];
		$status = $_POST["status"];

		if(!isset($website_id)) {
			if(isset($website) && isset($websiteUrl)) {
				$status = 'New';
				$sql = "INSERT INTO website_data(website_name, website_url, status) VALUES('$website', '$websiteUrl', '$status')";		
				$result = $conn->query($sql);
				if ($result === TRUE ) {
				    //echo "Data Inserted successfully";
				} else {
					echo "error: ".$sql."<br>".$conn->error;
				}
			}
		} else {
				$sql = "update website_data 
							set website_name='$website',
								website_url='$websiteUrl',
								status='$status'
							where website_id='$website_id'";
				$result = $conn->query($sql);
				if($result === TRUE ) {
					//echo "data updated successfully";
				} else {
					echo "error: ".$sql."<br>".$conn->error;
				}
		}
		include("header.php"); 

		$all_website_status = "select * from website_data";
		$data = $conn->query($all_website_status);
		if ($data->num_rows > 0) {
		    // output data of each row
			echo "<div id='container'><table class='table table-hover'>
					<tr>
						<th>id</th>
						<th>Website Name</th>
						<th>Website Url</th>
						<th>Status</th>
						<th></th><th></th>
					</tr>";
		    while($row = $data->fetch_assoc()) {
		    	echo "<tr>
		    			<td>".$row["website_id"]."</td>
		    			<td>".$row["website_name"]."</td>
		    			<td>".$row["website_url"]."</td>
		    			<td>".$row["status"]."</td>
		    			<td id='".$row["website_id"]."' class='edit'>edit</td>
		    			<td id='".$row["website_id"]."' class='delete'>delete</td>
		    		</tr>";
		    }
			echo "</table></div>";
		}

		$conn->close();
?>
<style type="text/css">
	.edit {
		cursor: pointer;
	}
	.delete {
		cursor: pointer;
	}
</style>

<script type='text/javascript' src='js/jquery.redirect.min.js'>
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.edit').click(function(){
			var id=$(this).attr('id');
   			$().redirect('edit_website_data.php', {'website_id': id});
		});
		$('.delete').click(function(){
			var id=$(this).attr('id');
   			$().redirect('delete_website_data.php', {'website_id': id});
		});
	});
</script>
<?php 
		include("footer.php");
	}
?>
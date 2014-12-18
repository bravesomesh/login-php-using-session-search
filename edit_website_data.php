<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: http://localhost/somesh/login-dashboard/');
	} else {
		include("header.php"); 
		include("config.php");

		$website_id = $_POST['website_id'];

		$sql = "select * from website_data where website_id=$website_id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        ?>
		        <form role="form" method="post" action="all_website_data.php">
					<div class="form-group">
						<input type="hidden" name="website_id" value="<?php echo $website_id; ?>">
						<label>Enter Website Name</label><input type="text" class="form-control" name="website" value="<?php echo $row['website_name']; ?>"><br>
						<label>Website Url</label><input class="form-control" type="text" name="websiteUrl" value="<?php echo $row['website_url']; ?>"><br>
						<label>Crawler status</label>
						<select class="form-control" name="status">
						  <option value="New"<?php if($row['status'] == 'New'){ echo ' selected="selected"'; } ?>>New</option>
						  <option value="InProgress"<?php if($row['status'] == 'InProgress'){ echo ' selected="selected"'; } ?>>In Progress</option>
						  <option value="Completed"<?php if($row['status'] == 'Completed'){ echo ' selected="selected"'; } ?>>Completed</option>
						</select><br>
						<div class="col-sm-4"></div>
						<input type="submit" class="col-sm-4 btn btn-default" name="submit" value="submit">
						<div class="col-sm-4"></div>
					</div>
				</form>
				<?php
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
		include("footer.php");
	}
?>
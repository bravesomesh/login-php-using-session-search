<?php 
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: http://localhost/somesh/login-dashboard/');
	} else {
		include("header.php"); 
?>
<div id="containter">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<center><h3>Enter Website Data</h3></center>
		</div>
		<div class="col-sm-4"></div>
	</div><br>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form role="form" method="post" action="all_website_data.php">
				<div class="form-group">
					<label>Enter Website Name</label><input type="text" class="form-control" name="website"><br>
					<label>Website Url</label><input class="form-control" type="text" name="websiteUrl"><br>
					<label>Crawler status</label><input class="form-control" type="text" name="crawlerStatus" placeholder="New" disabled><br>
					<div class="col-sm-4"></div>
					<input type="submit" class="col-sm-4 btn btn-default" name="submit" value="submit">
					<div class="col-sm-4"></div>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<?php 
		include("footer.php");
	}
?>
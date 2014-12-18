<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: http://localhost/somesh/login-dashboard/all_website_data.php');
	} else {
		include("header.php"); 
		$login_failed = $_GET['login_failed'];
?>

<div id="containter">
	<div class="row">
		<h1>&nbsp;</h1>
		<h1>&nbsp;</h1>
	</div>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
	<?php
		if(isset($login_failed)){ 
			echo "<span>Login Failed</span>"; 
		}
	?>
			<form role="form" method="post" action="login.php">
				<div class="form-group">
					<label>Email</label><input type="text" class="form-control" name="email"><br>
					<label>Password</label><input class="form-control" type="password" name="password"><br>
					<div class="col-sm-4"></div>
					<input type="submit" class="col-sm-4 btn btn-default" name="submit" value="submit">
					<div class="col-sm-4"></div>
				</div>
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>

<?php
		include("footer.php");
	}
?>

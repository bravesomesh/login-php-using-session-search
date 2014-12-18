<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: http://localhost/somesh/login-dashboard/');
	} else {
		$search = $_POST['search'];

		if(preg_match("^/[A-Za-z]+/", $search)) {
			$search = $_POST['search'];
		}

		if(isset($search)) {
			include("header.php"); 
			include("config.php");
			
			$sql="SELECT  * FROM website_data WHERE website_name LIKE '%" . $search .  "%'";
			$data = $conn->query($sql);
			
			if ($data->num_rows > 0) {
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
			} else {
				echo "<div id='container'><center><h4>Oops! There is no data. Search something else.</h4></center></div>";
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
		} else {
		    header("Location: http://localhost/somesh/login-dashboard/");
		}
	}
?>
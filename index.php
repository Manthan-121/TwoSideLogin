<?php include('db-config.php'); ?>
<form method="post" action="">
	<div>
		Username <input type="text" name="txt-uname" placeholder="Enter your username">
	</div>
	<div>
		Password <input type="Password" name="txt-upwd" placeholder="Enter your password">
	</div>
	<div>
		<input type="submit" name="btnsubmit" value="Login">
	</div>
</form>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['btnsubmit'])){
			$uname = $_POST['txt-uname'];
			$upwd = $_POST['txt-upwd'];
			$studsql = "SELECT * FROM tbl_student WHERE stud_uname = '$uname' AND stud_password = '$upwd'";
    		$studresult = mysqli_query($conn, $studsql);
    		// Check if the user exists
    		if(mysqli_num_rows($studresult) == 1) {
        		$_SESSION['studssn'] = $username;
        		?>
        		<script type="text/javascript">
        			window.location.href = "stud.php";
        		</script>
        		<?php
    		} else {
    			$viewsql = "SELECT * FROM tbl_viewer WHERE view_uname = '$uname' AND view_password = '$upwd'";
    			$viewresult = mysqli_query($conn, $viewsql);
    			if(mysqli_num_rows($viewresult) == 1) {
        			$_SESSION['viewssn'] = $username;
        			?>
        			<script type="text/javascript">
        				window.location.href = "viewer.php";
        			</script>
        		<?php
        		}else{
        			 echo "Invalid username or password";
        		}
        		
    		}
		}
	}
?>
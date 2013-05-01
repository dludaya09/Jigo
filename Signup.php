<html>
<body>
  <form action="Signup.php" method="post">
		<?php
		if($_GET) {
		if($_GET['not_found'] == 1) {
		?>
		<script type="text/javascript">
		alert('Please Enter a Userid');
		</script>
    	<?php } } 
    	?>

        <?php 
        $database='jingo';
        $user='root';
        $password='';
        $mysqli =new mysqli("localhost",$user,$password,$database);

        if (mysqli_connect_errno()) {
               printf("Connect failed: %s\n", mysqli_connect_error());
               exit();
        }?>
        <p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*
</tr>

<tr align="right">
<td>
<button style="width:75; height:35" value="Login" onClick="Login()">Log In<br><br>
</tr>

<tr align="left">
<td>
<br>
<font size="6" face="tempus sans itc">Sign Up</font>
</td>
</tr>

<tr>
<br>
<td>
<font size="4" face="century gothic">
Userid <br><input type="text" name="userid"><br>
Password <br><input type="password" name="password"><br>
Email <br><input type="text" name="email"><br>
Created At<br><input type="date" name="createdat"><br>

<input value="Sign Up" type="submit""></td>
</font>
</td>
</tr>
</table>
<?php
        if($_POST){
        	$userid=$_POST['userid'];
        	$pwd=$_POST['password'];
        	$email=$_POST['email'];
        	$date=$_POST['createdat'];
        	if(empty($userid)){
        		?>
        		<script type="text/javascript">
        		alert("Please Enter Userid");
        		</script><?php
        	}
        	if(empty($pwd)){
        		?>
        		<script type="text/javascript">
        		alert("Please Enter Password");
        		</script>
        		<?php
        	}
        	if(empty($email)){
        		?>
        		<script type="text/javascript">
        		alert("Please Enter Email");
        		</script>
        		<?php
        	}
        	$userfind="SELECT userid FROM user WHERE userid='$userid'";
        	$find=($mysqli->query($userfind));
        	if($find->num_rows>0){
        		?>
        		<script type="text/javascript">
        		alert("User already exists");
        		</script>
        		<?php
        	}
        	else{
        		$insert="INSERT INTO user(userid, email, password, createdat) VALUES('$userid', '$email', '$pwd', '$date')";
        		$val=($mysqli->query($insert));
        		if($val){
        			?>
        			<script type="text/javascript">
        			alert("Account successfully created");
        			</script>
        			<?php
        			header('Location:Search.php?num_rows=1') ; 
        		}
        		else{
        		echo ' ';
        	}
        	}
        }
        ?>

<script type="text/javascript">
function Login(){
window.open("http://localhost/Jingo/Jingo/Login.php");
}

</script>
</form>
</body>
</html>

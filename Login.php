<html>
<body>
	<form action="EditProfile.php" method="post">
		<?php 

        $database='jingo';
        $user='root';
        $password='';
        $mysqli =new mysqli("localhost",$user,$password,$database);

        if (mysqli_connect_errno()) {

               printf("Connect failed: %s\n", mysqli_connect_error());
               exit();
        }
            session_start();

if(is_null($_SESSION['userid']))
{
  ?>
  <script type="text/javascript">
  alert("Please Login");
  window.close("http://localhost/Jingo/Jingo/EditProfile.php");
  </script>
  <?php
}
$usr=$_SESSION['userid'];
$ID=(int)$usr;
            
        if($_POST){
        	$pwd=$_POST['password'];
        	$email=$_POST['email'];
        	$fname=$_POST['firstname'];
        	$lname=$_POST['lastname'];
        	$mname=$_POST['middlename'];
        	$city=$_POST['city'];
        	$State=$_POST['State'];
            $Country=$_POST['Country'];
        	$zip=$_POST['zip'];
            $sql=($mysqli->query("UPDATE user SET password='$pwd', email='$email' WHERE userid='$ID'"));
            $query=($mysqli->query("UPDATE profile SET firstname='$fname', middlename='$mname', lastname='$lname', city='$city', state='$State', country='$Country', zip='$zip' WHERE userid='$ID'"));
            }        
        ?>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*</font></font></td>
</tr>
<tr>
<td>
<br>
<font size="6" face="tempus sans itc">Edit Profile</font>
</td>
</tr>
<tr>
<td>
<font size="4" face="century gothic">
Userid <br><?php echo $_SESSION['userid']?><br>
Password<br><input type="password" name="password"><br>
Email<br><input type="text" name="email"><br>
First Name <br><input type="text" name="firstname"><br>
Middle Name <br><input type="text" name="middlename"><br>
Last Name <br><input type="text" name="lastname"><br>
City <br><input type="text" name="city"><br>
State <br><input type="text" name="State"><br>
Country <br><input type="text" name="Country"><br>
ZIP <br><input type="text" name="zip"><br>
<input value="Save" type="submit"></td>
</td>
</tr>
</table>
</font>
</font>
<font size="4" face="century gothic">
<a href="#Logout" data-toggle="tab" id="Logout" onClick="logout()">Log Out</a><br>
<a href="#home" data-toggle="tab" id="home" onClick="home()">Return Home</a><br>
<script type="text/javascript">
function logout(){
  window.open("http://localhost/Jingo/Jingo/logout.php");
}
function home(){
  window.open("http://localhost/Jingo/Jingo/Search.php");
}
</script>
</body>
</html>

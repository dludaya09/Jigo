<html>
<body>
  <form action="login.php" method="post">
		<?php 

        $database='jingo';
        $user='root';
        $password='';
        $mysqli =new mysqli("localhost",$user,$password,$database);

        if (mysqli_connect_errno()) {

               printf("Connect failed: %s\n", mysqli_connect_error());
               exit();
        }
        if($_POST){
        	$userid=$_GET['userid'];
        	$pwd=$_POST['password'];
        	$email=$_POST['email'];
        	$fname=$_POST['firstname'];
        	$lname=$_POST['lastname'];
        	$mname=$_POST['middlename'];
        	$city=$_POST['city'];
        	$state=$_POST['state'];
        	$country=$_POST['country'];
        	$zip=$_POST['zip'];
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
<br>
<td>
<font size="4" face="century gothic">
Userid <br><input type="text" name="userid"><br>
Password<br><input type="password" name="password"><br>
Email<br><input type="text" name="email"><br>
First Name <br><input type="text" name="firstname"><br>
Middle Name <br><input type="text" name="middlename"><br>
Last Name <br><input type="text" name="lastname"><br>
City <br><input type="text" name="city"><br>
State <br><input type="text" name="State"><br>
Country <br><input type="text" name="Country"><br>
ZIP <br><input type="text" name="zip"><br>
<button style="width 40; height:35">Save</td>
</font>
</td>
</tr>
</table>
</body>
</html>

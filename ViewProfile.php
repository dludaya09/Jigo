<html>
<body>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*</font></font></td>
</tr>

<tr align="right">
<td><Input type="submit" value="Logout" onClick="logout()">
<br></button></td>
</tr>

<tr>
<td>
<br>
<font size="6" face="tempus sans itc">User Profile</font>
</td>
</tr>
<tr>
<br>
<td>
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
{?>
  <script type="text/javascript">
  alert("Please Login");
  window.close("http://localhost/Jingo/Jingo/SearchUser.php");
  window.open("http://localhost/Jingo/Jingo/Home.php");
  </script>
  <?php
}
$usr=$_SESSION['userid'];
$ID=(int)$usr;
$rslt="Select * from profile where userid = '$ID'";
$result=($mysqli->query($rslt));
$X = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);?>
<font size="4" face="century gothic">Userid:<?php
echo $row['userid']; ?>
<br>First Name:<?php echo $row['firstname']; ?>
<br>Middle Name:<?php echo $row['middlename']; ?>
<br>Last Name:<?php echo $row['lastname']; ?>
<br>City:<?php echo $row['city']; ?>
<br>State:<?php echo $row['state']; ?>
<br>Country:<?php echo $row['country']; ?>
<br>ZIP:<?php echo $row['zip']; ?>
</font>
</table>
<font size="4" face="century gothic">
<a href="#home" data-toggle="tab" id="home" onClick="home()">Return Home</a><br></font>
<script type="text/javascript">
function logout(){
  window.open("http://localhost/Jingo/Jingo/logout.php");
}
function home(){
  window.open("http://localhost/Jingo/Jingo/Search.php");
}
</script>
</form>
</body>
</html>

<html>
<body>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*</font></font>
</font>
</td>
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
<form "ViewUserProfile.php" method="post">
<?php
$database='jingo';
        $user='root';
        $password='';
        $mysqli =new mysqli("localhost",$user,$password,$database);

        if (mysqli_connect_errno()) {

               printf("Connect failed: %s\n", mysqli_connect_error());
               exit();
        }
$id=$_GET['userid'];
$sql="SELECT * FROM profile WHERE userid='$id'";
$friend="SELECT friendid FROM friend WHERE userid='$id' or friendid='$id'";
if($result=($mysqli->query($friend)))
{
    while ($row = $result->fetch_row()){
        foreach($row as $key=>$value){
        	if($id==$value)
        	{
        		echo ' Friend ';
        	}
        }
    }
}
$result=($mysqli->query($sql));
$X = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);?>
<font size="4" face="century gothic">
			  <br>Userid:<?php echo $row['userid']; ?>
              <br>First Name:<?php echo $row['firstname']; ?>
              <br>Middle Name:<?php echo $row['middlename']; ?>
              <br>Last Name:<?php echo $row['lastname']; ?>
              <br>City:<?php echo $row['city']; ?>
              <br>State:<?php echo $row['state']; ?>
              <br>Country:<?php echo $row['country']; ?>
              <br>ZIP:<?php echo $row['zip']; ?>
</font>
</form>
</table>
</body>
</html>

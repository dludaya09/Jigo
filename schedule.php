<html>
<body>
<form action="Schedule.php" method="post">
  	
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
window.close("http://localhost/Jingo/Jingo/Schedule.php");
</script>
<?php
}?>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*
</tr>

<tr align="left">
<td>
<font size="6" face="tempus sans itc">Create New Schedule</font>
</td>
</tr>

<tr>

<td>
<font size="4" face="century gothic">
Scheduleid <br><input type="text" name="scheduleid"><br>
fromHour <br><input type="time" name="fromHour"><br>
toHour <br><input type="time" name="toHour"><br>
fromDay <br><input type="date" name="fromDay"><br>
toDay <br><input type="date" name="toDay"><br>
<input value="Add Schedule" type="submit">
<br><br>
<a href="#logout" data-toggle="tab" id="logout" onClick="logout()" > Logout </a> <br>
</td>
</tr>
</table>
<?php
if($_POST){
    $scid=$_POST['scheduleid'];
    $frmhr=$_POST['fromHour'];
    $tohr=$_POST['toHour'];
    $frmday=$_POST['fromDay'];
    $today=$_POST['toDay'];
    $scfind="select scheduleid from schedule";
    $find=($mysqli->query($scfind));
    if($find->num_rows==0){
    $INSERT="INSERT INTO schedule VALUES('$scid', '$frmhr', '$tohr', '$frmday', '$today')";
    $val=($mysqli->query($INSERT));
    }else{
    ?> 
    <script type="text/javascript">
    alert("Schedule already exists");
    </script>
    <?php   
    }
}
?>
<script type="text/javascript">
function logout(){
    window.open("http://localhost/Jingo/Jingo/logout.php");
}
</script>
</body>
</html>

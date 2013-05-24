<html>
<body>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*</font></font></td>
</tr>

<tr align="right">
<td><Input type="submit" value="Logout" onClick="logout()">

</tr>

<tr>
<td>
<br>
<font size="6" face="tempus sans itc">Friends</font>
</td>
</tr>
<tr>
<br>
<td>
<form action="ViewFriends.php" method="post">
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
$sql="SELECT friendid FROM friend WHERE userid ='$ID' or friendid='$ID'";
if($result=($mysqli->query($sql)))
        {
            while ($row = $result->fetch_row()){
            foreach($row as $key=>$value){ ?><br><font size="4" face="century gothic">
            <a href="ViewUserProfile.php?userid=<?php echo $value; ?>"><?php
                echo $value;
            }
        }
    }
?>
<br><a href="#home" data-toggle="tab" id="home" onClick="home()">Return Home</a><br>
<script type="text/javascript">
function logout(){
  window.open("http://localhost/Jingo/Jingo/logout.php");
}
function home(){
  window.open("http://localhost/Jingo/Jingo/Search.php");
}
</script>
</form>
</font>
</body>
</html>

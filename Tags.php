<html>
<body>
<form action="Tags.php" method="post">
        
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
window.close("http://localhost/Jingo/Jingo/Tags.php");
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
<font size="6" face="tempus sans itc">Create New Tag</font>
</td>
</tr>

<tr>

<td>
<font size="4" face="century gothic">
Tagid <br><input type="text" name="tagid"><br>
Tag Name <br><input type="text" name="tagname"><br>
<input value="Add Tag" type="submit">
<br><br>
<a href="#logout" data-toggle="tab" id="logout" onClick="logout()" > Logout </a> <br>
</td>
</tr>
</table>
<?php
if($_POST){
    $tagid=$_POST['tagid'];
    $tname=$_POST['tagname'];
    $tfind="SELECT tagid FROM tags WHERE tagid='$tagid'";
    $find=($mysqli->query($tfind));
    if($find->num_rows>0){
    ?> 
    <script type="text/javascript">
    alert("Tag already exists");
    </script>
    <?php }
    else{
    $INSERT="INSERT INTO tags VALUES('$tagid', '$tname')";
    $val=($mysqli->query($INSERT));
    if($val){
        ?>
        <script type="text/javascript">
        alert("Tag posted");
        </script>
        <?php
    }
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

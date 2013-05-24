<html>
<body>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*</font></font></td>
</tr>

<tr align="right">
<td><Input type="submit" value="Logout" onClick="logout()"></td>
</tr>

<tr>
<td>
<tr>
<td>
<form action="PostNote.php" method="post">
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
        if(is_null($_SESSION['userid'])){
        	?>
        	<script type="text/javascript">
        	alert("Please Login");
        	window.close("http://localhost/Jingo/Jingo/PostNote.php");
        	window.open("http://localhost/Jingo/Jingo/Home.php");
        	</script>
        	<?php
        }
        ?>
</td>
</tr>

<tr>
<td>
<font size="6" face="tempus sans itc">Post a Note <?php echo $_SESSION['userid']; ?></font>
</td>
</tr>

<tr>
<td>
<font size="4" face="century gothic">
Notesid <br><input type="text" name="notesid"><br>
Notes <br><input type="text" name="notes" name=text1 style="WIDTH: 500px; HEIGHT: 40px" size=11><br>
Link <br><input type="text" name="hyperlink"><br>
Radius <br><input type="text" name="radius"><br>
locationid:<br><select name="locationid">
<?php
$location="select locationid from location";
$lid=($mysqli->query($location));?>
<?php
while ($row = mysqli_fetch_array($lid)){
	$id=$row['locationid'];
	echo $id; ?>
	<option value="<?php echo $id; ?>">
	<?php	echo $id;?>
	</option>
<?php
}
?>
</select><br>
Scheduleid:<br><select name="scheduleid">
<?php
$schedule="select scheduleid from schedule";
$scid=($mysqli->query($schedule));?>
<?php
while ($row = mysqli_fetch_array($scid)){
	$id=$row['scheduleid'];
	echo $id; ?>
	<option value="<?php echo $id; ?>">
	<?php	echo $id;?>
	</option>
<?php
}
?>
</select><br>

Tagid:<br><select name="tagid">
<?php
$tag="select tagid from tags";
$tid=($mysqli->query($tag));?>
<?php
while ($row = mysqli_fetch_array($tid)){
	$id=$row['tagid'];
	echo $id; ?>
	<option value="<?php echo $id; ?>">
	<?php	echo $id;?>
	</option>
<?php
}
?>
</select><br>
<br>
<input value="Post" type="submit">
</td>
</tr>
<script type="text/javascript">
function logout(){
  window.open("http://localhost/jingo/Jingo/logout.php");
}
</script>
</form>
</table>
<?php 
if($_POST){
	$notesid=$_POST['notesid'];
	$notes=$_POST['notes'];
	$hyperlink=$_POST['hyperlink'];
	$id=$_SESSION['userid'];
	$locationid=$_POST['locationid'];
	$radius=$_POST['radius'];
	$scheduleid=$_POST['scheduleid'];
	$tagid=$_POST['tagid'];
	$notesfind="SELECT notesid FROM notes WHERE notesid='$notesid'";
	$find=($mysqli->query($notesfind));
	if($find->num_rows>0){
		?>
		<script type="text/javascript">
		alert("Notes already exists");
		</script>
		<?php
	}
	if(empty($notesid)){?>
		<script type="text/javascript">
		alert("Please enter notesid");
		</script><?php
	}
	else{
	$insert="INSERT INTO Notes VALUES('$notesid', '$notes', '$hyperlink', '$locationid', '$radius', '$id', '$scheduleid', '$tagid')";
	$val=($mysqli->query($insert));
	if($val){
	?>
	<script type="text/javascript">
	alert("Notes successfully created");
	</script>
	<?php 
}
}
}
?>
</body>
</html>

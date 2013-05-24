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
        session_start();
if(is_null($_SESSION['userid']))
{
  ?>
  <script type="text/javascript">
  alert("Please Login");
  window.close("http://localhost/Jingo/Jingo/Search.php");
  </script>
  <?php
}?>
<p align="left"><font size="10" face="brush script mt"></p>
<table align="left">
<tr>
<td bgcolor="#F778A1" width="2000" height="100"><font size="10"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*</font></font></td>
</tr>
<tr>
<td>
<font size="6" face="Century Gothic"><br>Welcome<?php echo $_SESSION['userid']; ?><br></font>
<font size="4" face="tempus sans itc">
<a href="#editprofile" data-toggle="tab" id="editprofile" onClick="Edit()">Edit Profile</a><br>
<a href="#viewprofile"data-toggle="tab" id="viewprofile" onClick="Prof()"> View Profile </a><br>
<a href="#searchuser" data-toggle="tab" id = "searchuser" onClick="View()">Search User</a><br>
<a href="#viewfriend" data-toggle="tab" id = "viewfriend" onClick="friend()">View Friend</a><br>
<a href="#postnote" data-toogle="tab" id="postnote" onClick="notes()">Post Notes</a><br>
<a href="#schedule" data-toogle="tab" id="schedule" onClick="schedule()">Add Schedule</a><br>
<a href="#tag" data-toogle="tab" id="tag" onClick="tag()">Add Tag</a><br>
<a href="#location" data-toogle="tab" id="location" onClick="loc()">Locations</a><br>
<a href="#logout" data-toggle="tab" id="logout" onClick="logout()" > Logout </a> <br>
</td>
</tr>
</table>
<script type="text/javascript">
function Edit(){
  window.open("http://localhost/jingo/Jingo/EditProfile.php");
}
function View(){
  window.open("http://localhost/jingo/Jingo/SearchUser.php");
}
function Prof() {
  window.open("http://localhost/jingo/Jingo/ViewProfile.php");
}
function friend(){
  window.open("http://localhost/Jingo/Jingo/ViewFriends.php");
}
function notes(){
  window.open("http://localhost/Jingo/Jingo/PostNote.php");
}
function schedule(){
  window.open("http://localhost/Jingo/Jingo/Schedule.php");
}
function tag(){
  window.open("http://localhost/Jingo/Jingo/Tags.php");
}
function loc(){
  window.open("http://localhost/Jingo/Jingo/Places.php");
}
function logout(){
  window.open("http://localhost/Jingo/Jingo/logout.php")
}
</script>
</font>
</form>
</body>
</html>

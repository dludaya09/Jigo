<html>
<body>
  <form action="logout.php" method="post">
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
session_destroy();
?>
<input value="LogOut" type="submit" onClick="logout()">
</form>
<script type="text/javascript">
function logout(){
alert("Logged Out");	
window.close("http://localhost/Jingo/Jingo/logout.php");
}
</script>
</body>
</html>

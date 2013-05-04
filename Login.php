<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>

<body>
    <?php
        
        if($_GET) {
                
                if($_GET['not_found'] == 1) {
    ?>
    <script type="text/javascript">
				alert('Not Found user') ;
    </script> 

    	<?php } } ?>

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
      
      if(empty($userid)){
         if($_POST) { 

        	$userid=$_POST['userid'];

        	$pwd=$_POST['password']; 
            $sql="SELECT userid, password FROM user WHERE userid='$userid' AND password='$pwd'";
        
        	$result=($mysqli->query($sql)); 
        	if($result->num_rows == 1) { 
                session_start();
                $_SESSION['userid']=$userid;
        		header('Location:Search.php?num_rows=1');
        	}else{ 
        		header('Location:login.php?not_found=1') ; 
        	} 
        } 

        if($_GET) { 

        	$not_found = $_GET['not_found']; 
        } 
    }
    else if(!is_null($_SESSION['userid']))
    {
           ?>
            <script type="text/javascript">
            alert("Please signout and signin as different user");
            window.open("http://localhost/Jingo/Jingo/Search.php");
            </script>
            <?php
        }
?>

        <table align="left">
           <tr>
                <td bgcolor="#F778A1" width="2000" height="100"><font size="10" 

                face="brush script mt"><b> Jingo</b><br><font size="4" face="century gothic">*Share best places with people*
            </tr></font>

            <tr align="right">
                <td><button onclick="Signup()" style="width:75; height:35"value="Sign Up">Sign Up<br>
                <br></button></td>
            </tr>

            <tr align="center">
                <td><br>
                <br>
                <font size="6" face="tempus sans itc">Sign In</font>
                </td>
            </tr>
            <font size="4" face="century gothic">
            <tr align="center">
                <td><br>
                <br>
                Userid<br>
                <input name="userid" type="text"><br>
                <br>
                Password<br>
                <input name="password" type="password"><br>
                <br>
                <input value="Sign In" type="submit"></td>
            </font>
            </tr>
        </table>

    <script type="text/javascript">
		function Signup(){
    			window.open("http://localhost/jingo/jingo/signup.php");
    		}
    </script> 
    </form>
</body>
</html>

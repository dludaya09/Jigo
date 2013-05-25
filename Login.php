<!DOCTYPE html>

<html>
<head>
<meta name="keywords" content=""></meta>
<meta name="description" content=""></meta>
<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
<title>Jingo</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<div id="Jingo">
    <div id="header" class="container">
        <h1>Jingo</a></h1>
    </div>
</div>

<div id="login"></div>
<div class="actions">
    <form id="Login" action="Login.php" method="post">
    <h3>Login To Your Account</h3>
    <fieldset>
    <legend>Login</legend>
    <label for="Userid">Userid:</label>
    <input type="text" name="userid" id="userid" required><br><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required><br><br>
    <input type="submit" value="login" id="login" onClick="login()">
    </fieldset>
</form>
</div>
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
<script type="text/javascript">
function Signup(){
window.open("http://localhost/jingo/jingo/signup.php");
}
</script> 
</form>
</body>

<script type="text/javascript">
function login(){
window.open("http://localhost/Jingo/Jingo/Search.php");
}
</script>

<style type="text/css">
html, body{
    height: 100%;
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 16px;
    color: #000000;
}
#Jingo {
    overflow: hidden;
    height: 90px;
    background: url(img02.jpg) repeat-x left top;
}

#header {
    width: 950px;
    height: 200px;
    margin: 0 auto;
    padding: 0px 20px;
    background: url(img01.jpg) no-repeat left top;
}

#login{
position:absoloute;
height: 30px;
width: 90px;
left: 300px;
top: 400px;
}
.actions{

    background-color: #FFFFFF;
    bottom: 150px;
    padding: 10px;
    position: absolute;
    right: 550px;
    z-index: 2;

    border-top: 1px solid #abbbcc;
    border-left: 1px solid #a7b6c7;
    border-bottom: 1px solid #a1afbf;
    border-right: 1px solid #a7b6c7;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
}
.Login{
width: 200px;
background: #ffffff; 
margin:20px 0;
padding:10px;
border: 1px solid #597c30;
border-radius:10px; 
box-shadow: 0 0 10px rgba(0,0,0, .65); 
font-family: Open Sans Condensed, Verdana, Arial, Helvetica, sans-serif; 
font-size: 1.1em;
right:500;

}

#Login fieldset{
  border: none;
}

#Login legend{
  display: none;
}

#Login input, #Login textarea{
display:block;
}

#Login label {
padding:4px 10px 4px 4px;
font-size:1.2em;
color:#000;
}

#Login input#login {
background: #3084a4;
border:1px solid #3084a4;
color:#fff;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3);
padding:5px 10px;
font-size:1.2em;
margin-left:30px;
border-radius:5px;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 4px 4px #5d6257;
}

#Login input#login:active{
border:1px solid #3084a4;
}

#Login input#login:hover, #Login input#login:focus{
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 1px 4px #5d6257;
cursor:pointer;
}
</style>

</html>

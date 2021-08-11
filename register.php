<!doctype html>  
<html>  
<head>  
<title>REGISTER</title>   
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>  
<body>  
<div>
<header>ADMIN REGISTER</header>
<div class="lab">Registration Form</div>
<form action="" method="POST" name="register">  
<div class="lab">Username:</div>
<input type="text" name="user" class="input"><br />  
<div class="lab">Password:</div>
<input type="password" name="pass" class="input"><br />   
<input type="submit" value="Register" name="submit" class="lab"/>
<button type="button" name="login" class="lab" onClick="window.location.href='login.php'">Log In</button>
</form>
</div>  
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
    $con=mysql_connect('localhost','root','') or die(mysql_error());  
    mysql_select_db('user') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM login WHERE user_id='".$user."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO login(user_id,password) VALUES('$user','$pass')";  
  
    $result=mysql_query($sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That username already exists! Please try again with another.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
</body>  
</html>
<!doctype html>  
<html>  
<head>  
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>  
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>  
<body> 
<div> 
<header><h3>ADMIN</h3></header>
<div class="header2">LOGIN</div>
<form action="" method="POST" name="login">  
Username: <input type="text" name="user" class="input"><br />  
Password: <input type="password" name="pass" class="input"><br/>   
<input type="submit" value="Login" name="submit" class="lab"/>
<button type="button" name="register" onClick=window.location.href="register.php" class="lab">Register</button>
</form>
</div>  
<?php 
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysql_connect('localhost','root','') or die(mysql_error());  
    mysql_select_db('user') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM login WHERE user_id='".$user."' AND password='".$pass."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysql_fetch_assoc($query))  
    {  
    $dbusername=$row['user_id'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: libmasy.html");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   
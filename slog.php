<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
ENROLL
</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body bgcolor="black" align="center">
    <nav class="nav_menu">
        <a href="libmasy.html">HOME</a>
        <a href="enroll.php">NEW ENROLL</a>
        <a href="book.php">NEW BOOK</a>
	<a href="ibook.php">ISSUE BOOK</a>
	<a href="slog.php">LOG IN</a>
	<a href="stud.php">STUDENTS</a>
	<a href="books.php">BOOKS</a>
	<a href="repo.php">REPORTS</a>
    </nav>
<div>
<?php
include("db.php");
if(isset($_POST['sub']))
{
 date_default_timezone_set('Asia/Calcutta');
 $ssid=$_POST['sid'];
 $sdate=date('y.m.d');
 $stime=date('H:i:s');
 $query=mysqli_query($mysqli,"SELECT * FROM student WHERE sid='".$ssid."'");
 if(mysqli_num_rows($query)==0) 
  {
  echo "student not exists !";
  }
 else
 {   
 $result=mysqli_query($mysqli,"INSERT INTO `slogin`(`SID`, `SDATE`, `STIME`,'STATUS') VALUES ('$ssid','$sdate','$stime','TRUE')");
	if($result)
	{
		echo"student Log In successfully !";
	}
	else
	{
		echo "Student Failed to Log In !";
	}
 }
}
?>
<form action="" method="post" name="slogin">
<header><h3>STUDENT LOG IN</H3></header>
<div class="lab">STUDENT ID :</div>
<input type="number" class="input" name="sid"><br>
<input type="submit" name="sub" value="log In" class="lab">
<input type="reset" name="res" value="reset" class="lab">
</form>
</div>
<div>
<?php
if(isset($_POST['ret']))
{
 $ssid=$_POST['lsid'];
 $sldate=date('y.m.d');
 $sltime=date('H:i:s');
 $query=mysqli_query($mysqli,"SELECT * FROM slogin WHERE sid='".$ssid."'");
 if(mysqli_num_rows($query)==0)
  {
  echo "student not logged in !";
  }
 else
  {
	$result2=mysqli_query($mysqli,"INSERT INTO slogout (`SID`, `SDATE`, `STIME`,'STATUS') VALUES ('$ssid','$sldate','$sltime','FALSE')");
	if($result2)
	{
		echo" Student Log Out successfully !";
	}
	else
	{
		echo("Student Failed to Log Out !");
	}
  }
}
?>
<form action="" method="post" name="slogout">
<header><h3>STUDENT LOG OUT</H3></header>
<div class="lab">STUDENT ID :</div>
<input type="number" class="input" name="lsid"><br>
<input type="submit" name="ret" value="log Out" class="lab">
<input type="reset" name="res" value="reset" class="lab">
</form>
</div>
</body>
</html>
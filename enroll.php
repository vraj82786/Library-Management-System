<?php
include("db.php");
if(isset($_POST['sub']))
{
$sname=$_POST['sname'];
$ayear=$_POST['ayear'];
$course=$_POST['course'];
$year=$_POST['year'];
$bgroup=$_POST['bgroup'];
$query=mysqli_query($mysqli,"SELECT * FROM student WHERE sname='".$sname."'");
if(mysqli_num_rows($query)>0)  
{
  echo "student already exists !";
}
else
{
 $result=mysqli_query($mysqli,"INSERT INTO student(`SID`, `SNAME`, `ACYEAR`, `BGROUP`, `COURSE`, `YEAR`) VALUES ('','$sname','$ayear','$bgroup','$course','$year')");
  if($result)
	{
		echo"One Student Enrolled Successfully !";
	}
else
	{
		echo("failed the insertion !");
	}
}
}
?>
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
<form action="" method="post" name="enroll">
<header><h3>NEW STUDENT REGISTRATION</H3></header>
<div class="lab">STUDENT NAME :</div>
<input type="text" class="input" name="sname" placeholder="e.g. varun anand"><br>
<div class="lab">ACADEMIC YEAR :</div>
<input type="text" class="input" name="ayear" placeholder="2020-21"><br>
<div class="lab">COURSE NAME :</div>
<input type="text" class="input" name="course" placeholder="BBA-CA"><br>
<div class="lab">YEAR:</div>
<input type="text" class="input" name="year" placeholder="FY/SY/TY"><br>
<div class="lab">BLOOD GROUP:</div>
<select name="bgroup"  class="input">
<option value="A+">A+</option>
<option value="AB+">AB+</option>
<option value="B+">B+</option>
<option value="O+">O+</option>
<option value="A-">A-</option>
<option value="AB-">AB-</option>
<option value="B-">B-</option>
<option value="O-">O-</option>
</select><br>
<input type="submit" name="sub" value="submit" class="lab">
<input type="reset" name="res" value="clear all" class="lab">
</form>
</div>
</body>
</html>
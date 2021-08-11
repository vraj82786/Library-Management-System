<!DOCTYPE html>
<html lang="en">
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
<form action="" method="post" name="ibook">
<header><h3>STUDENTS</h3></header>
<select name="searchby"  class="input" placeholder="select category to search">
<option value="id">Id</option>
<option value="name">Name</option>
<option value="acyear">Academic Year</option>
<option value="course">Course</option>
<option value="year">Year (FY/SY/TY)</option>
<option value="bgroup">Blood Group</option>
</select>
<input type="text" class="input" name="input">
<input type="submit" class="lab" name="submit" value="search">
</form>
</div>
<div style="background-color:black;border:outset 5px red;padding:5px;margin:5px;border-radius:25px;width:175px;color:gold;margin-left:575px;margin-top:15px;">SEARCH RESULTS</div>
<div class="output">
<table cellpadding="2px" cellspacing="1px" border="3px">
<thead>
<tr>
<th width="15px"> Student Id</th>
<th width="150px">Student Name</th>
<th width="100px">Academic Year</th>
<th width="150px">Course</th>
<th width="100px">Year (FY/SY/TY)</th>
<th width="150px">Blood Group</th>
</tr>
</thead>
<?php
include("db.php");
if(isset($_POST['submit']))
{
$searchby=$_POST['searchby'];
$input=$_POST['input'];
if($searchby=='id')
{
$query = mysqli_query($mysqli,"SELECT * FROM student WHERE sid='".$input."'");
}
elseif($searchby=='name')
{
$query = mysqli_query($mysqli,"SELECT * FROM student WHERE sname='".$input."'");
}
elseif($searchby=='acyear')
{
$query = mysqli_query($mysqli,"SELECT * FROM student WHERE acyear='".$input."'");
}
elseif($searchby=='course')
{
$query = mysqli_query($mysqli,"SELECT * FROM student WHERE course='".$input."'");
}
elseif($searchby=='year')
{
$query = mysqli_query($mysqli,"SELECT * FROM student WHERE year='".$input."'");
}
elseif($searchby=='bgroup')
{
$query = mysqli_query($mysqli,"SELECT * FROM student WHERE bgroup='".$input."'");
}
else
{
echo " invalid category selection ! ";
}
while($res = mysqli_fetch_array($query))
{
echo'<tbody>';
echo'<tr>';
echo'<td>'.$res['SID'];
echo'<td>'.$res['SNAME'];
echo'<td>'.$res['ACYEAR'];
echo'<td>'.$res['COURSE'];
echo'<td>'.$res['YEAR'];
echo'<td>'.$res['BGROUP'];
echo'</tr>';
echo'</tbody>';
}
}
?>
</table>
</div>
<div style="background-color:black;border:outset 5px red;padding:5px;margin:5px;border-radius:25px;width:175px;color:gold;margin-left:575px;margin-top:25px;">ALL STUDENTS</div>
<div class="output">
<table cellpadding="5px" border="3px">
<thead>
<tr>
<th width="15px">Student Id</th>
<th width="150px">Student Name</th>
<th width="100px">Academic Year</th>
<th width="150px">Course</th>
<th width="100px">Year (FY/SY/TY)</th>
<th width="150px">Blood Group</th>
</tr>
</thead>
<?php
$query2 = mysqli_query($mysqli,"SELECT * FROM student");
while($res = mysqli_fetch_array($query2))
{
echo'<tbody>';
echo'<tr>';
echo'<td>'.$res['SID'];
echo'<td>'.$res['SNAME'];
echo'<td>'.$res['ACYEAR'];
echo'<td>'.$res['COURSE'];
echo'<td>'.$res['YEAR'];
echo'<td>'.$res['BGROUP'];
echo'</tr>';
echo'</tbody>';
}
?>
</table>
</div>
</body>
</html>
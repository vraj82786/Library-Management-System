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
<header><h3>REPORTS</H3></header>
<input type="submit" class="lab" name="submit" value="STUDENT LOGIN">
<input type="submit" class="lab" name="submit" value="BOOK ISSUED">
</form>
</div>
<div class="output">
<table cellpadding="5px" border="3px">
<thead>
<tr>
<th width="25px">Student ID </th>
<th width="150px">Login Date</th>
<th width="150px">Login Time</th>
<th width="150px">Logout Date</th>
<th width="150px">Logout Time</th>
</tr>
</thead>
<?php
include("db.php");
if(isset($_POST['slogr']))
{
$query2 = mysqli_query($mysqli,"SELECT * FROM slogin");
$query3 = mysqli_query($mysqli,"SELECT * FROM slogout");
while($res = mysqli_fetch_array($query2) && $res2 = mysqli_fetch_array($query3))
{
echo'<tbody>';
echo'<tr>';
echo'<td>'.$res['SID'];
echo'<td>'.$res['SDATE'];
echo'<td>'.$res['STIME'];
echo'<td>'.$res2['SDATE'];
echo'<td>'.$res2['STIME'];
echo'</tr>';
echo'</tbody>';
}
}
?>
</table>
</div>
</body>
</html>
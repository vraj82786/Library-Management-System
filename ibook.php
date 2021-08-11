<?php
include("db.php");
if(isset($_POST['sub']))
{
$sid=$_POST['isid'];
$bid=$_POST['ibid'];
$idate=date('Y.m.d');
$rdate=date('Y.m.d',strtotime('+7 days'));
$query=mysqli_query($mysqli,"SELECT * FROM student WHERE sid='".$sid."'");
$query2=mysqli_query($mysqli,"SELECT * FROM book WHERE bid='".$bid."'");
$query3=mysqli_query($mysqli,"SELECT * FROM issuebook WHERE bid='".$bid."'");
if(mysqli_num_rows($query)==0) 
  {
  echo "student not exists !";
  }
else if( mysqli_num_rows($query2)==0 || mysqli_num_rows($query3)!=0)
     {
        echo " book not in library !";
     }
    else 
     {
       $result=mysqli_query($mysqli,"INSERT INTO `issuebook`(`SID`,`BID`,`IDATE`, `RDATE`) VALUES ('$sid','$bid','$idate','$rdate')");
       if($result)
       {
	    echo " Book issued successfully !";
	}
         else
	{
	    echo " failed to issue book ! ";
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
<form action="" method="post" name="ibook">
<header><h3>ISSUE BOOK TO STUDENT</H3></header>
<div class="lab">STUDENT ID :</div>
<input type="number" class="input" name="isid"><br>
<div class="lab">BOOK ID</div>
<input type="number" class="input" name="ibid"><br>
<input type="submit" name="sub" value="Issued" class="lab">
<input type="reset" name="res" value="clear " class="lab">
</form>
<form action="" method="post" name="rbook">
<header><h3>RETURN BOOK TO LIBRARY</H3></header>
<div class="lab">STUDENT ID :</div>
<input type="number" class="input" name="rsid"><br>
<div class="lab">BOOK ID</div>
<input type="number" class="input" name="rbid"><br>
<input type="submit" name="ret" value="Returned" class="lab">
<input type="reset" name="res" value="clear" class="lab">
</form>
<?php
if(isset($_POST['ret']))
{
$sid=$_POST['rsid'];
$bid=$_POST['rbid'];
$rdate=date('Y.m.d');
$result=mysqli_query($mysqli,"INSERT INTO `returnbook`(`SID`,`BID`, `RDATE`) VALUES ('$sid','$bid','$rdate')");
if($result)
{
  echo " success ! book returned to library ";
}
else
{
  echo " failed to return book ! ";
}
}
?>
</div>
</body>
</html>
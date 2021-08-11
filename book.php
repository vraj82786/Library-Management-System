<?php
include("db.php");
if(isset($_POST['sub']))
{
$bname=$_POST['bname'];
$bauthor=$_POST['author'];
$bprice=$_POST['price'];
$bpub=$_POST['pub'];
$bpubaddr=$_POST['pubaddr'];
$bloc=$_POST['loc'];
$query=mysqli_query($mysqli,"SELECT * FROM book WHERE bname='".$bname."'");
if(mysqli_num_rows($query)>0)  
{
  echo "book location is already FULL !";
}
else
{
$result=mysqli_query($mysqli,"INSERT INTO `book`(`BID`, `BNAME`, `AUTHOR`, `PRICE`, `LOCATION`, `PUB`, `PUBADDR`) VALUES ('','$bname','$bauthor','$bprice','$bloc','$bpub','$bpubaddr')");
if($result)
{
echo" Voila ! New BOOK entered in the LIBRARY Successfully !";
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
BOOK
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
<form action="" method="post" name="book">
<header><h3>NEW BOOK ENTRY</H3></header>
<div class="lab">BOOK NAME :</div>
<input type="text" class="input" name="bname" placeholder="e.g. the ultimate power"><br>
<div class="lab">AUTHOR :</div>
<input type="text" class="input" name="author" placeholder="e.g. james kelvith"><br>
<div class="lab">PRICE :</div>
<input type="number" class="input" name="price" placeholder="99.99"><br>
<div class="lab">PUBLICATION</div>
<input type="text" class="input" name="pub" placeholder=""><br>
<div class="lab">PUB<sup>n</sup> ADDRESS</div>
<input type="text" class="input" name="pubaddr" placeholder=""><br>
<div class="lab">LOCATION</div>
<input type="text" class="input" name="loc" placeholder=""><br>
<input type="submit" name="sub" value="submit" class="lab">
<input type="reset" name="res" value="clear all" class="lab">
</form>
</div>
</body>
</html>
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
<header><h3>BOOKS</H3></header>
<select name="searchby"  class="input" placeholder="select category to search">
<option value="id">Id</option>
<option value="bname">Name</option>
<option value="author">Author</option>
<option value="price">Price</option>
<option value="pub">Publication</option>
<option value="pubaddr">Pub<sup>n</sup> Address</option>
<option value="loc">Location</option>
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
<th width="15px">Book Id</th>
<th width="150px">Book Name</th>
<th width="100px">Author</th>
<th width="25px">Price</th>
<th width="100px">Publication</th>
<th width="100px">Pub<sup>n</sup> address</th>
<th width="150px">Location</th>
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
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE bid='".$input."'");
}
elseif($searchby=='bname')
{
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE bname='".$input."'");
}
elseif($searchby=='author')
{
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE author='".$input."'");
}
elseif($searchby=='price')
{
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE price='".$input."'");
}
elseif($searchby=='pub')
{
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE pub='".$input."'");
}
elseif($searchby=='pubaddr')
{
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE pubaddr='".$input."'");
}
elseif($searchby=='loc')
{
$query = mysqli_query($mysqli,"SELECT * FROM book WHERE location='".$input."'");
}
else
{
echo " invalid category selection ! ";
}
while($res = mysqli_fetch_array($query))
{
echo'<tbody>';
echo'<tr>';
echo'<td>'.$res['BID'];
echo'<td>'.$res['BNAME'];
echo'<td>'.$res['AUTHOR'];
echo'<td>'.$res['PRICE'];
echo'<td>'.$res['PUB'];
echo'<td>'.$res['PUBADDR'];
echo'<td>'.$res['LOCATION'];
echo'</tr>';
echo'</tbody>';
}
}
?>
</table>
</div>
<div style="background-color:black;border:outset 5px red;padding:5px;margin:5px;border-radius:25px;width:175px;color:gold;margin-left:575px;margin-top:25px;">ALL BOOKS</div>
<div class="output">
<table cellpadding="5px" border="3px">
<thead>
<tr>
<th width="25px">Book Id</th>
<th width="150px">Book Name</th>
<th width="150px">Author</th>
<th width="25px">Price</th>
<th width="150px">Publication</th>
<th width="150px">Pub<sup>n</sup> address</th>
<th width="150px">Location</th>
</tr>
</thead>
<?php
$query2 = mysqli_query($mysqli,"SELECT * FROM book");
while($res = mysqli_fetch_array($query2))
{
echo'<tbody>';
echo'<tr>';
echo'<td>'.$res['BID'];
echo'<td>'.$res['BNAME'];
echo'<td>'.$res['AUTHOR'];
echo'<td>'.$res['PRICE'];
echo'<td>'.$res['PUB'];
echo'<td>'.$res['PUBADDR'];
echo'<td>'.$res['LOCATION'];
echo'</tr>';
echo'</tbody>';
}
?>
</table>
</div>
</body>
</html>
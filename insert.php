<?php

$ssn = $_POST['ssnInput'];
$name = $_POST['nameInput'];
$surname = $_POST['surnameInput'];
$dept = $_POST['deptInput'];
$room = $_POST['roomInput'];
$email = $_POST['emailInput'];

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');
$sql = 'INSERT INTO instructor (issn, iname, isurname, dept, room, iemail) VALUES ("' .$ssn. '", "' .$name. '", "' .$surname. '", "' .$dept. '", "' .$room. '", "' .$email. '")';
$mysqli_result = mysqli_query($db, $sql);

if($mysqli_result)
{
	$newSql = "SELECT * FROM instructor";
	$mysqli_result = mysqli_query($db, $newSql);
	while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo $row['issn']." with name ".$row['iname']." ".$row['isurname']." with dept ".$row['dept']." with room ".$row['room']." and with email ".$row['iemail']."<br>";
		}
}
else
{
	echo mysqli_error($db);
}
?>


</br>
<a href="index.html">Back to search page</a>
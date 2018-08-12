<?php

$sid = $_POST['sidInput'];
$sname = $_POST['snameInput'];
$ssurname = $_POST['ssurnameInput'];
$age = $_POST['ageInput'];
$totalcredit = $_POST['totalcreditInput'];
$semail = $_POST['semailInput'];

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');
$sql = 'INSERT INTO student (sid, sname, ssurname, age, semail, totalcredit) VALUES ("' .$sid. '", "' .$sname. '", "' .$ssurname. '", "' .$age. '", "' .$semail. '", "' .$totalcredit. '")';
$mysqli_result = mysqli_query($db, $sql);

if($mysqli_result)
{
	$newSql = "SELECT * FROM student";
	$mysqli_result = mysqli_query($db, $newSql);
	while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo $row['sid']." with name ".$row['sname']." ".$row['ssurname']." with age ".$row['age']." with email ".$row['semail']." and with total credit ".$row['totalcredit']."<br>";
		}
}
else
{
	echo mysqli_error($db);
}
?>


</br>
<a href="index.html">Back to search page</a>
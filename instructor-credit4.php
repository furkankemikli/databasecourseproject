<?php

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
	$sql = "SELECT I1.iname,I1.isurname,C1.cname FROM Instructor I1,Course C1,Teaches T1 WHERE C1.cid = T1.cid and I1.issn = T1.issn and C1.cid in (SELECT C.cid FROM Course C WHERE C.credit > 3)";
	
	$mysqli_result = mysqli_query($db, $sql);
	
	$count = mysqli_num_rows($mysqli_result);
	if($count==0) {
		echo "No instructor found...";
	}
	else {
		//Print out the results
		while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo "Name of instructors and their courses which has at least 4 credit are: ".$row['iname']." ".$row['isurname']."---".$row['cname']."<br>";
		}
	}

mysqli_close($db);
?>

</br>
<a href="index.html">Back to search page</a>
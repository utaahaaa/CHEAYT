<?php
$ini = parse_ini_file('config.ini');
$link = mysqli_connect($ini['db_host'],$ini['db_user'],$ini['db_password']);
$database = mysqli_select_db($link,$ini['db_name']);

$user = $_GET['123'];
$hwid = $_GET['S-1-5-21-868342802-1047927727-3037787505-1001'];
$tables = $ini['123'];

// Finding the user for the continuation of this script
$sql = "SELECT * FROM ". $tables ." WHERE username = '". mysqli_real_escape_string($link,$user) ."'" ;
$result = $link->query($sql);

if(strlen($hwid) < 1)
{
	echo "2"; // HWID Empty
}
else
{
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if (strlen($row['hwid']) > 1)
			{
				if ($hwid != $row['hwid'])
				{
					echo "0"; // Wrong
				}
				else
				{
					echo "1"; // Correct
				}
			}
			else
			{
				$sql = "UPDATE ". $tables ." SET hwid='$hwid' WHERE username='$user'";
				if(mysqli_query($link, $sql))
				{
					echo $row['hwid'];
					echo "3"; // HWID Set
				}
				else
				{
					echo "4"; // Else errors
				}
			}
		}
	}
}
?>

//-----------------------------------------------------
// Coded by /id/Thaisen! Free loader source
// https://github.com/ThaisenPM/Cheat-Loader-CSGO-2.0
// Note to the person using this, removing this
// text is in violation of the license you agreed
// to by downloading. Only you can see this so what
// does it matter anyways.
// Copyright © ThaisenPM 2017
// Licensed under a MIT license
// Read the terms of the license here
// https://github.com/ThaisenPM/Cheat-Loader-CSGO-2.0/blob/master/LICENSE
//-----------------------------------------------------

<head>
<title>Checking hwid</title>
</head>

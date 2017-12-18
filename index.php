<?php
if (
	isset($_GET["deviceId"]) && !empty($_GET["deviceId"])
	&& isset($_GET["speechId"]) && !empty($_GET["speechId"])
	&& isset($_GET["rating"]) && !empty($_GET["rating"])
	)
{
	$db = new SQLite3('db/stats.sqlite', SQLITE3_OPEN_READWRITE);
	$statement = $db->prepare("INSERT INTO `ratings` (`deviceId`, `speechId`, `rating`)
		VALUES (:deviceId, :speechId, :rating)");
	$statement->bindValue(':deviceId', $_GET['deviceId'], SQLITE3_TEXT);
	$statement->bindValue(':speechId', $_GET['speechId'], SQLITE3_TEXT);
	$statement->bindValue(':rating', $_GET['rating'], SQLITE3_INTEGER);
	echo false === $statement->execute() ? "0" : "1";
}
else
	echo "0";
?>

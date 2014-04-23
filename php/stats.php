<?php
$con = mysqli_connect($DB["server"], $DB["user"], $DB["password"],$DB["database"]) or die("Unable to reach Database!");

mysqli_query($con, "SET NAMES utf8");


$sql = "SELECT SUM(verses) AS sum_verses FROM `rbv_count`";
$row = mysqli_fetch_object(mysqli_query($con,$sql));
$VERSES_COUNT = $row->sum_verses;

$BOOKS = array();
$sql = "SELECT  book, MAX(chapter) AS chapters, SUM(verses) AS sum_verses FROM `rbv_count` GROUP BY book ORDER BY id";
if ($result = mysqli_query($con, $sql))
{
	while ($row = mysqli_fetch_assoc($result))
	{
		array_push($BOOKS,array(title => $row["book"], chapters => $row["chapters"], verses => $row["sum_verses"]));
	}
}
$BOOKS_COUNT = count($BOOKS);

$CHAPTERS = array();
$sql = "SELECT  book, chapter, verses FROM `rbv_count` ORDER BY id";
if ($result = mysqli_query($con, $sql))
{
	while ($row = mysqli_fetch_assoc($result))
	{
		array_push($CHAPTERS,array(nr => $row["chapter"], book => $row["book"], verses => $row["verses"]));
	}
}
$CHAPTERS_COUNT = count($CHAPTERS);

mysqli_close($con);
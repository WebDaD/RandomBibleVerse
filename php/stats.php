<?php
$con = mysqli_connect($DB["server"], $DB["user"], $DB["password"],$DB["database"]) or die("Unable to reach Database!");

mysqli_query($con, "SET NAMES utf8");


$sql = "SELECT SUM(verses) AS sum_verses FROM `rbv_count`";
$row = mysqli_fetch_object(mysqli_query($con,$sql));
$VERSES = $row->sum_verses;



mysqli_close($con);
<?php

include("../config.php");


$con = mysqli_connect($DB["server"], $DB["user"], $DB["password"],$DB["database"]) or die("Unable to reach Database!");


mysqli_query($con, "SET NAMES utf8");

$output = "{";

$sql = "SELECT DISTINCT lang,lang_key FROM `rbv_translations` ORDER BY lang_key";
if ($result = mysqli_query($con, $sql))
{
	while ($row = mysqli_fetch_assoc($result))
	{
		$output.= "\"".$row["lang_key"]."\": \"".$row["lang"]."\",";
	}
}

$output = rtrim($output, ",");

$output .= "}";
mysqli_close($con);

header('Content-type: application/json');
echo $output;

?>
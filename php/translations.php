<?php

include("../config.php");

$lang = $_GET["lang"];

$con = mysqli_connect($DB["server"], $DB["user"], $DB["password"],$DB["database"]) or die("Unable to reach Database!");


mysqli_query($con, "SET NAMES utf8");

$output = "{";
$sql = "SELECT name,name_key FROM `rbv_translations` WHERE lang_key='".$lang."' ORDER BY name_key ";
if ($result = mysqli_query($con, $sql))
{
	while ($row = mysqli_fetch_assoc($result))
	{
		$output.= "\"".$row["name_key"]."\": \"".$row["name"]."\",";
	}
}

$output = rtrim($output, ",");
$output .= "}";


mysqli_close($con);

header('Content-type: application/json');
echo $output;

?>
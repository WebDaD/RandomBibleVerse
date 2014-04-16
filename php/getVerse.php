<?php
error_reporting(E_ALL);
ini_set("display_errors",true);
//Get A Random Bible Verse

//http://www.bibleserver.com/text/{Übersetzung}/{Bibelstelle}


//Übersetzung: GET["translation"]
//Language: GET["lang"]

//stelle: bookCh,ve

include("../config.php");
include("simple_html_dom.php");

$con = mysqli_connect($DB["server"], $DB["user"], $DB["password"],$DB["database"]) or die("Unable to reach Database!");

if($_GET["trans"] == "" && $_GET["lang"] == "") die('Parameters "trans" or "lang"  missing.');

if($_GET["trans"] == "" && $_GET["lang"] != ""){
	$lang = mysqli_real_escape_string($con, $_GET["lang"]);
	$trans="";
} 
if($_GET["trans"] != ""){
	$trans = mysqli_real_escape_string($con, $_GET["trans"]);
}





mysqli_query($con, "SET NAMES utf8");

if($trans == ""){
	$row = mysqli_fetch_object(mysqli_query($con, "SELECT name_key FROM `rbv_translations` WHERE lang_key='".$lang."' ORDER BY rand() LIMIT 1"));
	$trans = $row->name_key;
}

$sql = "SELECT book,chapter,verses FROM `rbv_count` ORDER BY rand() LIMIT 1";
$row = mysqli_fetch_object(mysqli_query($con,$sql));

$book = $row->book;
$chapter = $row->chapter;
$verse = rand(1,$row->verses);

mysqli_close($con);


$url = "http://www.bibleserver.com/text/".$trans."/".$book.$chapter.",".$verse;

$html = new simple_html_dom();
$html->load_file($url);

$id=0;
foreach($html->find("span[class=verseNumber] a") as $element){
	
	if($element->innertext==$verse){
		$idt = explode("_",$element->id);
		$id=$idt[0];
	}
}
echo $html->find("div[id=".$id."]",0)->innertext."<br/><span class=\"source\">(".$trans." - ".$book." ".$chapter.", ".$verse.")</span>";

?>
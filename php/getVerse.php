<?php
//Get A Random Bible Verse

//http://www.bibleserver.com/text/{Übersetzung}/{Bibelstelle}


//Übersetzung: GET["translation"]
//Language: GET["lang"]

//stelle: bookCh,ve

if(isset($direct) && $direct==1){
	include("config.php");
	require "php/simple_html_dom.php";
} else {
	include("../config.php");
	include("simple_html_dom.php");
}



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

$output="";

$url = "http://www.bibleserver.com/text/".$trans."/".$book.$chapter.",".$verse;


$html = new simple_html_dom($url);
 


$id=0;
foreach($html->find("span[class=verseNumber] a") as $element){
	
	if($element->innertext==$verse){
		$idt = explode("_",$element->id);
		$id=$idt[0];
	}
}
$output = $html->find("div[id=".$id."]",0)->innertext;

$output = preg_replace("(<span class=\"verseNumber\">(.*?)</span>)e","",$output); //<span class="verseNumber"><a id="b3ref23048012_vno" href="javascript:void('Verse details');" no="12,12" crossrefs="yes">12</a>&nbsp;</span>

$output = preg_replace("(<noscript(.*?)</noscript>)e","",$output); //<noscript class="small" title="Querverweise"> (<a href="/text/HFA/Jesaja44%2C6" target="_blank">Jes 44,6</a>)</noscript>

if($output==""){
	$output = "Could not load Verse.";
} else {
	$output .= "<br/><span class=\"source\">(".$trans." - ".$book." ".$chapter.", ".$verse.")</span>";
	$output = mb_convert_encoding($output,'HTML-ENTITIES','utf-8');
}
echo $output;

?>
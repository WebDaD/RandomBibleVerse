/**
 * 
 */

$( document ).ready(function() {

	$("#verse").load("./php/getVerse.php?trans=HFA", function(data){
		$("#verse span.verseNumber").remove();
	});

});
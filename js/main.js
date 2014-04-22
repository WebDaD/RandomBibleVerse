/**
 * 
 */

$( document ).ready(function() {

	$("#verse").load("./php/getVerse.php?trans=HFA", function(data){
		$("#verse span.verseNumber").remove();
		$("#verse noscript.small").remove();
	});

	$('#content').on('click', '#btn_reload', function(evt) {
    	evt.preventDefault();
    	$("#verse").load("./php/getVerse.php?trans=HFA", function(data){
    		$("#verse span.verseNumber").remove();
    		$("#verse noscript.small").remove();
    	});
    	
 });
});
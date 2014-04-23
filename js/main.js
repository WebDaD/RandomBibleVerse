/**
 * 
 */

$( document ).ready(function() {

	if($.session.get('rbv_trans') === undefined && $.cookie('rbv_trans') === undefined &&  $.getUrlVar('trans') === undefined){
		$("#main").hide();
		$("#settings").show();
		$.getJSON("php/translations.php", function(data){
			var options = $("#cb_trans");
			$.each(data, function(key,val) {
			    options.append($("<option />").val(key).text(val));
			});
		});
		$.getJSON("php/languages.php", function(data){
			var options = $("#cb_lang");
			$.each(data, function(key,val) {
			    options.append($("<option />").val(key).text(val));
			});
		});
		
	} else {
		var trans = "";
		if(trans == "" && $.session.get('rbv_trans') !== undefined){trans = $.session.get('rbv_trans');}
		if(trans == "" && $.cookie('rbv_trans') !== undefined){trans = $.cookie('rbv_trans');}
		if(trans == "" && $.getUrlVar('trans') !== undefined){trans = $.getUrlVar('trans');}
		$.session.set('rbv_trans', trans);
		$.cookie('rbv_trans', trans, { expires: 365});
		
		var lang = "";
		if(lang == "" && $.session.get('rbv_lang') !== undefined){lang = $.session.get('rbv_lang');}
		if(lang == "" && $.cookie('rbv_lang') !== undefined){lang = $.cookie('rbv_lang');}
		if(lang == "" && $.getUrlVar('lang') !== undefined){lang = $.getUrlVar('lang');}
		$.session.set('rbv_lang', lang);
		$.cookie('rbv_lang', lang, { expires: 365});
		
		window.addEventListener('shake', shakeEventDidOccur, false);
	}
	
	
	$('#content').on('click', '#btn_display_settings', function(evt) {
    	evt.preventDefault();
    	
    	window.removeEventListener('shake', shakeEventDidOccur, false);
  
    	$("#main").hide();
		$("#settings").show();	
		$.getJSON("php/translations.php", function(data){
			var options = $("#cb_trans");
			$.each(data, function(key,val) {
			    options.append($("<option />").val(key).text(val));
			});
		});
		$.getJSON("php/languages.php", function(data){
			var options = $("#cb_lang");
			$.each(data, function(key,val) {
			    options.append($("<option />").val(key).text(val));
			});
		});
	});
	
	$('#content').on('click', '#btn_save', function(evt) {
    	evt.preventDefault();
    	$.session.set('rbv_trans', $("#cb_trans").val());
		$.cookie('rbv_trans', $("#cb_trans").val(), { expires: 365});
		$.session.set('rbv_lang', $("#cb_lang").val());
		$.cookie('rbv_lang', $("#cb_lang").val(), { expires: 365});
    	$("#settings").hide();
    	$("#verse").load("./php/getVerse.php?trans="+$.session.get('rbv_trans')+"&lang="+$.session.get('rbv_lang'));
    	$("#main").show();
    	window.addEventListener('shake', shakeEventDidOccur, false);
	});
	
	$("#verse").load("./php/getVerse.php?trans="+$.session.get('rbv_trans')+"&lang="+$.session.get('rbv_lang'));

	$('#content').on('click', '#btn_reload', function(evt) {
    	evt.preventDefault();
    	$("#verse").load("./php/getVerse.php?trans="+$.session.get('rbv_trans')+"&lang="+$.session.get('rbv_lang'));
	});
	
	function shakeEventDidOccur () {
		$("#verse").load("./php/getVerse.php?trans="+$.session.get('rbv_trans')+"&lang="+$.session.get('rbv_lang'), function(data){
			$("#verse").effect( "bounce" );
		});
	    
	}
});
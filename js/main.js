/**
 * 
 */
function uniqueId() { return Math.round(Math.random()*10000); }

$( document ).ready(function() {

	if($.session.get('rbv_trans') === undefined && $.cookie('rbv_trans') === undefined &&  $.getUrlVar('trans') === undefined){ //This is only on first visit
		var language = window.navigator.userLanguage || window.navigator.language;
		$("#main").hide();
		$("#settings").show();
		
		$.getJSON("php/languages.php", function(data){
			var options = $("#cb_lang");
			options.html('');
			$.each(data, function(key,val) {
			    options.append($("<option />").val(key).text(val));
			});
			options.val( language);
			$.getJSON("php/translations.php?lang="+$("#cb_lang").val(), function(data){
				var options = $("#cb_trans");
				options.html('');
				$.each(data, function(key,val) {
				    options.append($("<option />").val(key).text(val));
				});
				
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
		
		$.getJSON("php/languages.php", function(data){
			var options = $("#cb_lang");
			options.html('');
			$.each(data, function(key,val) {
			    options.append($("<option />").val(key).text(val));
			});
			options.val( $.session.get('rbv_lang'));
			$.getJSON("php/translations.php?lang="+$("#cb_lang").val(), function(data){
				var options = $("#cb_trans");
				options.html('');
				$.each(data, function(key,val) {
				    options.append($("<option />").val(key).text(val));
				});
				options.val( $.session.get('rbv_trans'));
			});
		});
		
		
		
	});
	
	$('#content').on('change', '#cb_lang', function(evt){
		evt.preventDefault();
		$.getJSON("php/translations.php?lang="+$("#cb_lang").val(), function(data){
			var options = $("#cb_trans");
			options.html('');
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
    	loadVerse();
    	$("#main").show();
    	window.addEventListener('shake', shakeEventDidOccur, false);
	});
	
	$('#content').on('click', '#btn_cancel', function(evt) {
		evt.preventDefault();
		$("#settings").hide();
		loadVerse(); 
    	$("#main").show();
    	window.addEventListener('shake', shakeEventDidOccur, false);
    	
	});
	
	$('#content').on('click', '#btn_to_donate', function(evt) {
    	evt.preventDefault();
    	
    	window.removeEventListener('shake', shakeEventDidOccur, false);
  
    	$("#main").hide();
		$("#donate").show();	
	});
	$('#content').on('click', '#btn_cancel_donate', function(evt) {
		evt.preventDefault();
		$("#donate").hide();
		loadVerse(); 
    	$("#main").show();
    	window.addEventListener('shake', shakeEventDidOccur, false);
    	
	});
	
	loadVerse(); 

	$('#content').on('click', '#btn_reload', function(evt) {
    	evt.preventDefault();
    	loadVerse(); 
	});
	
	function shakeEventDidOccur () {
		 loadVerse(); 
	}
	
	function loadVerse(){
		$("#verse").load("./php/getVerse.php?trans="+$.session.get('rbv_trans')+"&lang="+$.session.get('rbv_lang')+"&uid="+uniqueId(), function(data){
			$("#verse").effect( "bounce" );
		}); 
	}
});
<?php 
if($_GET["type"] == "rest"){
	$direct=1;
	$_GET["trans"]="HFA";
	$_GET["lang"]="de";
	include 'php/getVerse.php';
	
	die();
}
?>
<html  manifest="rbv.manifest">
	<head>
		<?php include 'config.php';?>
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

		<link rel="icon" sizes="196x196" href="img/logo-196.png">
		<link rel="apple-touch-icon" sizes="57x57" href="img/logo-57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="img/logo-72.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="img/logo-114.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="img/logo-144.png" />
		
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
		
		<!-- iPhone 3GS, 2011 iPod Touch -->
		<link rel="apple-touch-startup-image" href="img/startup-320x460.png" media="screen and (max-device-width : 320px)">
		<!-- iPhone 4, 4S and 2011 iPod Touch -->
		<link rel="apple-touch-startup-image" href="img/startup-640x920.png" media="(max-device-width : 480px) and (-webkit-min-device-pixel-ratio : 2)">
		<!-- iPhone 5 and 2012 iPod Touch -->
		<link rel="apple-touch-startup-image" href="img/startup-640x1096.png" media="(max-device-width : 548px) and (-webkit-min-device-pixel-ratio : 2)">
		<!-- iPad landscape -->
		<link rel="apple-touch-startup-image" sizes="1024x748" href="img/startup-1024x748.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)">
		<!-- iPad Portrait -->
		<link rel="apple-touch-startup-image" sizes="768x1004" href="img/startup-768x1004.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)">
		
		<meta name="viewport" content="width=device-width">
		<title><?php echo $TITLE;?> v<?php echo $VERSION;?> (From all <?php echo $VERSES_COUNT;?> Verses!)</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<meta name="author" content="Dominik Sigmund">
		<meta name="publisher" content="WebDaD.eu">
		<meta name="copyright" content="WebDaD.eu">
		<meta name="description" content="A Simple Website in HTML 5 to get a random bible verse via bibleserver.com. One may use the frontend or implement a own View using the REST-Call">
		<meta name="keywords" content="random,bible,verse, webdad">
		<meta name="page-topic" content="Culture">
		<meta name="page-type" content="WebApplication">
		<meta name="audience" content="Alle">
		<meta http-equiv="content-language" content="de">
		<meta name="robots" content="index, follow">
		<meta http-equiv="expires" content="Mon, 31 Dec 2114 00:00:00 GMT">
	</head>
	<body>
		
		<div id="header" class="ddd_background">
			<img id="logo" alt="<?php echo $TITLE;?>" src="img/logo-48.png"/> 
			<span id="headline"><?php echo $TITLE;?></span> 
			<a id="wdlogo" href="http://webdad.eu/tools" target="_blank"><img alt="WebDaD-Tools" src="http://webdad.eu/images/logos/webdad_tools.png" title="powered by WebDaD-Tools"/></a>	
		</div>
		<div id="content">
			<div id="main">
				<span id="verse"></span>
				<span class="button" id="btn_reload">Reload</span>
				<span class="mini_button" id="btn_display_settings">Settings</span>
			</div>
			<div id="settings">
				<h1>Settings</h1>
				<select class="tinput" id="cb_lang" name="cb_lang"></select>
				<select class="tinput" id="cb_trans" name="cb_trans"></select>
				<span class="button" id="btn_save">Save</span>
			</div>
		</div>
		<div id="footer" class="ddd_background">
			<a id="impressum" href="http://webdad.eu/wd-impressum" target="_blank">Impressum</a>	
			<a id="webdad" href="http://webdad.eu/" target="_blank"><img alt="WebDaD" src="http://webdad.eu/templates/webdad/images/logo.png"/></a> 	
		</div>
		<script src="js/jquery-1.11.0.min.js" type="text/javascript" ></script>
		<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="js/jquery.cookie.js" type="text/javascript" ></script>
		<script src="js/jquery.session.js" type="text/javascript" ></script>
		<script src="js/jquery.urlvars.js" type="text/javascript" ></script>
		<script src="js/shake.js" type="text/javascript" ></script>
		<script src="js/main.js" type="text/javascript" ></script>
		<script type="text/javascript" src="http://clickheat.webdad.eu/js/clickheat.js"></script><script type="text/javascript"><!--
			clickHeatSite = 'RandomBibleVerse';clickHeatGroup = 'Tools';clickHeatServer = 'http://clickheat.webdad.eu/click.php';initClickHeat(); //-->
		</script>
		<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			  ga('create', 'UA-3844306-10', 'webdad.eu');
			  ga('send', 'pageview');
			
			</script>
	</body>
</html>
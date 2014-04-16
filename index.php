<html>
	<head>
		<?php include 'config.php';?>
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="icon" sizes="196x196" href="img/logo-196.png">
		<link rel="apple-touch-icon" sizes="57x57" href="img/logo-57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="img/logo-72.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="img/logo-114.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="img/logo-144.png" />
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" /> <!-- TODO: Remove white border -->
		<meta name="viewport" content="width=device-width">
		<title><?php echo $TITLE;?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script src="js/jquery-1.11.0.min.js" type="text/javascript" ></script>
		<script src="js/main.js" type="text/javascript" ></script>
	</head>
	<body>
		<div id="header" class="ddd_background">
			<img id="logo" alt="<?php echo $TITLE;?>" src="img/logo-48.png"/> 
			<span id="headline"><?php echo $TITLE;?> v<?php echo $VERSION;?></span> 
			<a id="wdlogo" href="http://webdad.eu/tools" target="_blank"><img alt="WebDaD-Tools" src="http://webdad.eu/images/logos/webdad_tools.png" title="powered by WebDaD-Tools"/></a>	
		</div>
		<div id="content">
			<div id="main">
				<span id="verse"></span>
			</div>	
		</div>
		<div id="footer" class="ddd_background">
			<a id="impressum" href="http://webdad.eu/wd-impressum" target="_blank">Impressum</a>	
			<a id="webdad" href="http://webdad.eu/" target="_blank"><img alt="WebDaD" src="http://webdad.eu/templates/webdad/images/logo.png"/></a> 	
		</div>
	</body>
</html>
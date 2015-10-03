<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en"
	data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Planty</title>
<meta name="viewport" content="width=device-width">
<meta name="mobile-web-app-capable" content="yes">
<link rel="apple-touch-icon" href="img/logo_icon.png"/>
<link rel="apple-touch-icon-precomposed" href="img/logo_icon.png"/>
<link rel="icon" sizes="192x192" href="img/logo_icon.png">
<link rel="icon" sizes="128x128" href="img/logo_icon.png">
<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/plantyCustom.css" />
<link rel="manifest" href="manifest.json">
<script src="js/vendor/modernizr.js"></script>
<script src="js/planty.js"></script>
<link rel="stylesheet" href="css/plantyCustom.css" />
</head>
<body>
<?
	$user = getUser(getSessionUser());
?>
<div class="row">
	<div class="large-12 columns">

		<div class="row">
			<div class="large-12 columns headerFix">
				<nav class="top-bar" data-topbar>
					<ul class="title-area">

						<li class="name">
            	<a href="index.php" alt="Planty"><img src="/img/logo_text.png" class="logoText"/></a>
						</li>
						<li class="toggle-topbar menu-icon"><a href="#" class="welcomeText">Welcome, <span><?=$user->name;?></span>
						</a>
						</li>
					</ul>
					<section class="top-bar-section">

						<ul class="right">
							<li class="divider"></li>
							<li><a href="forest.php">My Forest</a>
								<li class="divider"></li>
							<li><a href="points.php">My Points</a>
							<li class="divider"></li>
							<?
							if (isLogged()){
							?>
							<li><a href="logout.php">Logout</a>
								<?}?>
							</li>
						</ul>
					</section>
				</nav>
			</div>
		</div>
        <div style="margin-top:15%;">
        
    

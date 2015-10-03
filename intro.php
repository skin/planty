<?
session_start();
require 'inc/includes.php';
include 'inc/switch-header.php';
?>
<body class="introBg">
	<div class="row">
		<div class="large-12 columns">
			<div class="row">
				<div class="large-12">
					<div id="featured" data-orbit>
						<img src="/img/intro/intro_1.png" alt="Per year, we breathe oxygen that is extracted from 7-8 trees.">
                        <img src="/img/intro/intro_2.png" alt="We all are always busy to care about these facts..">
                        <img src="/img/intro/intro_3.png" alt="Planty Logo">
                        <img src="/img/intro/intro_4.png" alt="Also it lets you take a small yet meaningful step towards the social cause">
                        <img src="/img/intro/intro_5.png" alt="This awesome gesture of gifting let you grow your own virtual forest here!">
                        <a href="login.php"><img src="/img/intro/intro_6.png" alt="Get Started"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-12 large-centered columns centerAlign">
		<a href="index.php?skip=true">Skip Intro</a>
	</div>
	<script>

	$(document).foundation({
	  orbit: {
	      circular: false
	  }
	});
</script>
<?
include 'inc/switch-footer.php';
?>

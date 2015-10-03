<?php
	session_start();
	require 'inc/includes.php';
	checkUserLoggedIn();
	checkIntro();
	include 'inc/header.php';
	include 'inc/index.php';
	include 'inc/footer.php';
?>

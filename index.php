<?php
	session_start();
	require 'inc/includes.php';
	checkIntro();
	checkUserLoggedIn();
	include 'inc/header.php';
	include 'inc/index.php';
	include 'inc/footer.php';
?>

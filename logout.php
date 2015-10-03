<?php
  session_start();
  require 'inc/includes.php';
  $facebook = getFacebook();
  $token = $facebook->getAccessToken();
  $url = 'https://www.facebook.com/logout.php?next=http://'.getRemoteHostname().'&access_token='.$token;
  logoutUser();
  header('Location: '.$url);
?>

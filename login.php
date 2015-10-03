<?
	session_start();
	require 'inc/includes.php';
	setIntroShown();
	$user = getFBUser();
	if ($user) {
	  try {
	    // Proceed knowing you have a logged in user who's authenticated.
	    $userProfile = getFBUserProfile();
			$userSQL = getUser($userProfile['id']);
			if (empty($userSQL)){
				addUser($userProfile['id'],$userProfile['name']);
			}
			setFBUserSession($userProfile);
	  } catch (FacebookApiException $e) {
	    error_log($e);
	    $user = null;
	  }
	}
	include 'inc/switch-header.php';
?>

<body style="background:#ffffff !important;">
<div class="large-3 large-centered columns">
  <div class="login-box">
  <div class="row">
  <div class="larger-1 columns logoPlanty">
      <img src="img/logo.png" alt="Planty Logo"/>
  </div>
  <div class="large-12 columns">
    <form>
        <div class="row">
				<div class="large-12 large-centered columns fb">
					<!--<a href="<?=getFacebook()->getLoginUrl(); ?>"><img src="../img/fb.png"/></a>-->
                   <a class="button expand buttonFb" href="<?=getFacebook()->getLoginUrl(); ?>">Sign Up With Facebook</a>
				</div>
        </div>
        <div class="row">
				<div class="large-12 large-centered columns">
					<a class="button expand" href="" value="">Sign Up With Email </a>
				</div>
                <div class="large-12 large-centered columns centerAlign logInLinks">
					<a href="">Log in</a>
				</div>
        </div>
        <div class="row">
                <div class="large-12 large-centered columns centerAlign back2Intro">
					<a href="intro.php">Back to Intro</a>
				</div>
        </div>



      <!-- <div class="row">
         <div class="large-12 columns">
             <input type="text" name="username" placeholder="Username" />
         </div>
       </div>
      <div class="row">
         <div class="large-12 columns">
             <input type="password" name="password" placeholder="Password" />
         </div>
      </div>
      <div class="row">
        <div class="large-12 large-centered columns">
          <input type="submit" class="button expand" value="Log In"/>
        </div> -->
      </div>

    </form>
  </div>
</div>
</div>
</div>
<?php
include 'inc/switch-footer.php';
?>

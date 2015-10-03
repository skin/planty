<?
session_start();
require 'inc/includes.php';
checkUserLoggedIn();
$user = getUser(getSessionUser());
include 'inc/header.php';
?>
<div class="row">
  <div class="large-2 small-0 columns">&nbsp;</div>
  <div class="large-8 small-12 columns">
    <center>
      <!--<img src="<?=getFBProfilePictureURL()?>"/>-->
    <h5>
      <img src="img/coins.png" width="150"/>
      <br/>
        <br/>
      Your earned <strong><?=$user->points?></strong> points so far.
      <? if ($user->points>0){
        ?>
        <br/>
        Reedem them now making another gift to your friends!
        <br/>
        <br/>
        <a href="choose.php"><button>Gift a friend now</button></a>
        <?
      }
      ?>
    </h5>
  </center>
  </div>
  <div class="large-2 small-0 columns">&nbsp;</div>
</div>


<?
include 'inc/footer.php';

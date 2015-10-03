<?
session_start();
require 'inc/includes.php';
checkUserLoggedIn();
$user = getUser(getSessionUser());
include 'inc/header.php';
?>
<div class="row">
<div class="card">
  <br/>
    <center>
      <!--<img src="<?=getFBProfilePictureURL()?>"/>-->
    <h5><img src="img/coins.png" width="150"/>
      <br/>
        <br/>
      Your earned <strong><?=$user->points?></strong> points so far.
      <? if ($user->points>0){
        ?>
        <br/>
        Reedem them now by sending another gift to your friends!
        <br/>
        <br/>
        <a href="choose.php" class="button expand">Gift a friend now</a>
        <?
      }
      ?>
    </h5>
  </center>
</div>
  </div>

<?
include 'inc/footer.php';

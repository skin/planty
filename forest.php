<?
session_start();
require 'inc/database.php';
require 'inc/commons.php';
checkUserLoggedIn();

include 'inc/header.php';
$user = getUser(getSessionUser());
?>
<style>
.board-text{
  font-size:13pt;
}
.board {
  width: 60%;
}
.empty-forest {
  width: 60%;
  position: relative;
  top: -38px;
  left: -2px;
}
.has-tip {
  border-bottom: none;
}
.has-tip:hover, .has-tip:focus {
  border-bottom: none;
}

@media only screen
and (min-device-width : 320px)
and (max-device-width : 500px)
{ /* STYLES GO HERE */
  .board-text {
    font-size:8pt;
  }
  .board {
    width: 80%;
  }
  .empty-forest {
    width: 90%;
    position: relative;
    top: -36px;
    left: -5px;
  }
}
@media only screen
and (min-device-width : 500px)
and (max-device-width : 700px)
{ /* STYLES GO HERE */
  .board-text {
    font-size:12pt;
  }
  .board {
    width: 80%;
  }
  .empty-forest {
    width: 90%;
    position: relative;
    top: -50px;
    left: -5px;
  }
}
</style>

<div class="row">
<div class="card">

<div class="titleOnCard" style="text-align:center;"><?=$user->name?>'s Forest</div>
  <br>
    <center>
      <img class="empty-forest" src="img/empty_forest.png"/>
    </center>
    <?
    	$gifts = getGifts($user);
      while($gift = array_shift($gifts)){
    	?>
        <img data-tooltip aria-haspopup="true"  title="Gift for <?=$gift->friendName;?>, <br/> given on <?=getFormattedDate($gift->giftDate)?> (<?=$gift->plantName?>, <?=$gift->points?> Points)" class="tree has-tip radius" src="img/tree.png" width="50px" style="display:none;">
    	<?
    	}
    ?>
    <div class="name floater">Plants gifted</div><div class="name" style="float:right"><?=sizeof(getGifts($user))?></div>
    <div style="clear:both;"></div>
    <div class="name floater">Number of friends</div><div class="name" style="float:right"><?=getCountFriendsGifted($user)?></div>
    <div style="clear:both;"></div>
    <div class="centerAlign" style="padding:4%;">
         <a href="choose.php">Gift more!</a>
   </div>

</div>
</div>

<script src="js/vendor/jquery.js"></script>
<script>
$('document').ready(
  function(){
    displayTrees();
  }
);
</script>
<?
include 'inc/footer.php';
?>

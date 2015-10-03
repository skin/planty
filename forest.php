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
    top: -50px;
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
<div class="large-4 small-3 columns">&nbsp;</div>
<div class="large-4 small-6 columns">
  <center>
  <div class="board-text" style="color:#984900;position:relative;top:4em;left:0em;">
    <strong><?=$user->name?> <br/>  Forest</strong>
  </div>
  <img class="board" src="img/board.png"/>
  </center>
</div>
<div class="large-4 small-3 columns">&nbsp;</div>
</div>
<div class="row">
<div class="large-2 small-0 columns">&nbsp;</div>
<div class="large-8 small-12 columns">
  <center>
    <img class="empty-forest" src="img/empty_forest.png"/>
  </center>
  <?
  	$gifts = getGifts();
    while($gift = array_shift($gifts)){
  	?>

      <img data-tooltip aria-haspopup="true"  title="Gift for <?=$gift->friendName;?>, <br/> given on <?=getFormattedDate($gift->giftDate)?> (<?=$gift->plantName?>, <?=$gift->points?> Points)" class="tree has-tip radius" src="img/tree.png" width="50px" style="display:none;">
  	<?
  	}
  ?>
</div>
<div class="large-2 small-0 columns">&nbsp;</div>
</div>
	<script src="js/vendor/jquery.js"></script>
<script>
function getRandomNumber(start,end) {
    return Math.floor(Math.random() * end) + start
}

$('document').ready(
  function(){
    $(".tree").each(function(index) {
      $(this).show();
      $(this).css("position","absolute");
      $(this).css("top",getRandomNumber(10,50)+"%");
      $(this).css("left",getRandomNumber(30,40)+"%");
      console.log( index + ": " + $(this).text() );
    });
  }
);
</script>
<?
include 'inc/footer.php';
?>

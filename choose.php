<?
session_start();
require 'inc/database.php';
require 'inc/commons.php';
checkUserLoggedIn();
include 'inc/header.php';

$friend = getFriend($_GET["friendID"]);

?>

  <div class="title choose">
      Choose a plant for <?=$friend->name;?>
  </div>
<div class="row">
  <div class="large-12 columns">
  <?
    $plants = getPlants();
    while($plant = array_shift($plants)){
	?>
      <div class="large-6 small-12 columns">
        <div class="panel">
          <div class="row">
            <div class="large-4 small-6 columns">
              <img src="<?=getPlantImage($plant->id)?>"/>
              <div class="buy">
                <a href="buy.php?friendID=<?=$friend->id;?>&plantID=<?=$plant->id;?>"><button>Gift it!</button></a>
              </div>
            </div>
          <div class="large-8 small-6 columns">
          <strong><?=$plant->name?></strong>
          <hr><?=$plant->description?>
          <h6 class="subheader"><?=$plant->price?> CHF</h6>
        </div>
      </div>
    </div>
  </div>

  	<?
  	}
  ?>
  </div>
</div>
<?
include 'inc/footer.php';
?>

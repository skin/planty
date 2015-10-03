<?
session_start();
require 'inc/database.php';
require 'inc/commons.php';
checkUserLoggedIn();
include 'inc/header.php';

$friend = getFriend($_GET["friendID"]);

?>

<div class="row">
<div class="card">

  <div class="titleOnCard">
      Choose a plant for <?if(!empty($friend)){echo $friend->name;}else{echo "a friend";}?>
  </div>

  <div><img src="/img/filter.png"/></div>
<div class="row">
  <div class="large-12 columns">
  <?
    $plants = getPlants();
    while($plant = array_shift($plants)){
	?>

        <div class="panel">
          <div class="row">

            <div class="large-1 small-12 columns centerAlign">
              <img src="<?=getPlantImage($plant->id)?>"/>
            </div>
          <div class="large-11 small-0 columns">
          <div class="name"><?=$plant->name?></div>
          <p align="justify"><?=$plant->description?></p>
          <h6 class="subheader"><?=$plant->price?> CHF</h6>
          <div>
          <a class="button expand" href="buy.php?friendID=<?=$friend->id;?>&plantID=<?=$plant->id;?>">Gift it!</a>
          </div>
        </div>

      </div>
    </div>


  	<?
  	}
  ?>
  </div>
</div>

</div>
</div>
<?
include 'inc/footer.php';
?>

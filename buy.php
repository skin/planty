<?
session_start();
require 'inc/database.php';
require 'inc/commons.php';
checkUserLoggedIn();

include 'inc/header.php';

$friend = getFriend($_GET["friendID"]);
$plant = getPlant($_GET["plantID"]);

?>
<div class="row">

  <div class="large-8 small-12 columns card">

    <div class="titleOnCard">
      Your Selection
    </div>
  <ul class="pricing-table">
    <li class="title"><?=$plant->name?></li>

    <li class="description">
      <div class="row">
        <div class="large-12 small-12 columns">
              <img src="<?=getPlantImage($plant->id)?>" />
        </div>
        <!--<div class="large-8 small-8 columns">
          <?=$plant->description?>
        </div>-->
      </div>
    </li>
    <li class="price"><?=$plant->price?> CHF</li>
    <li class="bullet-item"><div class="name"><?if(!empty($friend)){echo $friend->name;}else{echo "Your friend";}?>'s<br>Shipping Details</div></li>
    <li class="bullet-item">

      <form>
        <div class="row">
          <div class="large-12 columns">
            <label>
              <input type="text" placeholder="Name" value="<?=$friend->name?>"/>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-4 columns">
            <label>
              <input type="text" placeholder="Shipping Address" />
            </label>
          </div>
          <div class="large-4 columns">
            <label>
              <input type="text" placeholder="City/Town" />
            </label>
          </div>
          <div class="large-4 columns">
            <label>
              <input type="text" placeholder="Post Code" />
            </label>
          </div>
        </div>
      </form>
    </li>
      <li class="bullet-item"><div class="name">Payment details</div></li>
      <li class="bullet-item">

        <form>
          <div class="row">
            <div class="large-12 columns">
              <label>
                <input type="text" placeholder="Credit Card Holder Name" value=""/>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>
                <input type="text" placeholder="Credit Card Number" />
              </label>
            </div>
          </div>
            <div class="row">
              <div class="large-4 columns">
                <label>
                  <input type="text" placeholder="Security Code" />
                </label>
              </div>
              <div class="large-4 columns">
                <label>
                  <input type="text" placeholder="Expiration Month" />
                </label>
              </div>
              <div class="large-4 columns">
                <label>
                  <input type="text" placeholder="Expiration Year" />
                </label>
              </div>
            </div>
        </form>
      </li>

    <li class="cta-button">
      <a href="transaction.php?friendID=<?=$friend->id;?>&plantID=<?=$plant->id;?>"><button class="button expand">Gift It Now</button></a>
    </li>
  </ul>



  </div>
  <div class="large-2 small-0 columns">&nbsp;</div>

</div>



<?
include 'inc/footer.php';
?>

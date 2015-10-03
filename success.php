<?
session_start();
require 'inc/includes.php';
checkUserLoggedIn();

include 'inc/header.php';

$friend = getFriend($_GET["friendID"]);
$plant = getPlant($_GET["plantID"]);

?>

<div class="row">
  <div class="large-2 small-0 columns">&nbsp;</div>
  <div class="large-8 small-12 columns">
    <center>
    <img src="img/success.png"/>
    <h5>
      Your payment has <strong>succeded</strong> <br/>
      You earned points <strong><?=$plant->points?></strong>, which you can redeem in the next purchase.
    </h5>
  </center>
  </div>
  <div class="large-2 small-0 columns">&nbsp;</div>
</div>
<br/>
<br/>
<div class="row">
  <div class="large-2 small-0 columns">&nbsp;</div>
  <div class="large-8 small-12 columns">
    <center>
    <h3>
      Awesome!! You did take a step towards social cause.
    </h3>
  </center>
  </div>
  <div class="large-2 small-0 columns">&nbsp;</div>
</div>
<div class="row">
  <div class="large-2 small-0 columns">&nbsp;</div>
  <div class="large-8 small-12 columns">
    <center>
    <a href="forest.php"><button>Check your forest</button></a>
  </center>
  </div>
  <div class="large-2 small-0 columns">&nbsp;</div>
</div>

<?
include 'inc/footer.php';
?>

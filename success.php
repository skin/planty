<?
session_start();
require 'inc/includes.php';
checkUserLoggedIn();

include 'inc/header.php';

$friend = getFriend($_GET["friendID"]);
$plant = getPlant($_GET["plantID"]);

?>

<div class="row">
  <div class="card">
    <center>
    <img src="img/success.png" class="successIcon"/>
    <div class="name">Your payment has been recieved successfully.</div> <br/>
    <div class="pricing-table" style="padding:4% 3%; border-radius:4px;">
    <h5>You earned <strong><?=$plant->points?></strong> points, which you can redeem in your next purchase.</h5>
    <div class="centerAlign" style="padding:2%;">
        <a href="points.php">View All Points Status</a>
    </div> 
    </div>
  
    <h4>
      Awesome!! You did take a step towards social cause, which adds another tree in your forest.
    </h4>

    <a href="forest.php"><button class="button expand">Go to your forest</button></a>
    
  </div>
</div>
<?
include 'inc/footer.php';
?>

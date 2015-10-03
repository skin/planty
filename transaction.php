<?
session_start();
require 'inc/database.php';
require 'inc/commons.php';

$friend = getFriend($_GET["friendID"]);
$plant = getPlant($_GET["plantID"]);

buyGift($friend,$plant);
earnPoints($plant);

header ("Location: success.php?friendID=".$friend->id."&plantID=".$plant->id);

?>

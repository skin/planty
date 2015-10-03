<?php
require 'facebook-php-sdk/src/facebook.php';

date_default_timezone_set("UTC");

function checkUserLoggedIn(){
	if (!isLogged()){
	  header ("Location: login.php");
	}
}

function checkIntro(){
	if (!wasIntroShown()){
	  header ("Location: intro.php");
	}
}

function isLogged(){
	$user =  $_SESSION['userID'];
	return !empty($user);
}

function logoutUser(){
	session_unset();
	setIntroShown();
}

function setIntroShown(){
	$_SESSION['intro'] = "yo";
}

function getSessionUser(){
	return $_SESSION['userID']['id'];
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function wasIntroShown(){
	$intro =  $_SESSION['intro'];
	return !empty($intro);
}

function getRemoteHostname(){
	return $_SERVER["HTTP_HOST"];
}
// Create our Application instance (replace this with your appId and secret).
function getFacebook(){
	$facebook = new Facebook(array(
		'appId'  => APP_ID,
		'secret' => APP_SECRET,
	));
	return $facebook;
}

function getFBUser(){
	return getFacebook()->getUser();
}

function getFBUserProfile(){
 return getFacebook()->api('/me?fields=name,email,picture.width(120).height(120)');
}

function getFBProfilePictureURL(){
	return getFBUserProfile()['picture']['data']['url'];
}

function setFBUserSession($userProfile){
	$_SESSION['userID'] = $userProfile;
	header ("Location: index.php");
}

function getDateFromTimestamp($timestamp){
	return date("Y-m-d H:i:s",$timestamp);
}

function getFriends(){
	$sql = "select id,name,birthday,picture FROM friends order by id asc";
	try {
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->execute();
		$friends = $stmt->fetchAll(PDO::FETCH_OBJ);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $friends;
}

function getPlants(){
	$sql = "select id,name,description,price,points FROM plants order by id desc";
	try {
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->execute();
		$plants = $stmt->fetchAll(PDO::FETCH_OBJ);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $plants;
}

function getPlantImage($plantID){
	return "/img/plants/".$plantID.".jpg";
}

function getUser($userID){
	$sql = "select userID,name,points FROM users WHERE userID=:userID";
	try {
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->bindParam("userID", $userID);
		$stmt->execute();
		$user = $stmt->fetchObject();
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $user;
}

function addUser($userID,$name){
	$sql = "INSERT INTO users (userID, name) VALUES (:userID,:name)";
	try {
		$creationDate = time();
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->bindParam("userID", $userID);
		$stmt->bindParam("name", $name);
		$stmt->execute();
	}catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function getFriend($friendID){
	$sql = "select id,name,birthday,picture FROM friends WHERE id=:friendID";
	try {
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->bindParam("friendID", $friendID);
		$stmt->execute();
		$friend = $stmt->fetchObject();
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $friend;
}

function getPlant($plantID){
	$sql = "select id,name,description,price,points FROM plants WHERE id=:plantID";
	try {
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->bindParam("plantID", $plantID);
		$stmt->execute();
		$plant = $stmt->fetchObject();
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $plant;
}

function buyGift($friend,$plant){
	$sql = "INSERT INTO gifts (plantID, friendID, userID, giftDate) VALUES (:plantID,:friendID,:userID,FROM_UNIXTIME(:giftDate))";
	try {
		$creationDate = time();
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->bindParam("plantID", $plant->id);
		$stmt->bindParam("friendID", $friend->id);
		$stmt->bindParam("userID", getSessionUser());
		$stmt->bindParam("giftDate", time());
		$stmt->execute();
	}catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function earnPoints($plant){
	$sql = "UPDATE users SET points=(points+:points) WHERE userID=:userID";
	try {
		$creationDate = time();
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->bindParam("points", $plant->points);
		$stmt->bindParam("userID", getSessionUser());
		$stmt->execute();
	}catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function getBirthday($friend){
	return date("d F", strtotime($friend->birthday));
}

function getFormattedDate($date){
	return date("d-m-Y", strtotime($date));
}

function getGifts(){
	$sql = "select userID,plantID,friendID,giftDate,f.name as friendName,p.name as plantName, p.points as points FROM gifts as g,friends as f,plants as p WHERE g.friendID=f.id AND p.id=g.plantID";
	try {
		$dbCon = getConnection();
		$stmt = $dbCon->prepare($sql);
		$stmt->execute();
		$gifts = $stmt->fetchAll(PDO::FETCH_OBJ);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $gifts;
}

?>

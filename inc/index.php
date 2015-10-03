
<div class="row">



<div class="card">
<div class="titleOnCard">Upcoming Birthdays</div>

<div class="friends">
<?
	$friends = getFriends();
  while($friend = array_shift($friends)){
	?>
	<a href="choose.php?friendID=<?=$friend->id;?>"><div class="friend clearFix">
		<div class="profile-picture floater">
				<img src="<?=$friend->picture?>" class="friendPic"/>
		</div>
        
        <div class="floater bdayInfo">
		<div class="name"><?=$friend->name?></div> 
		<div class="birthday"><?=getBirthday($friend)?></div>    
        </div>
        
        <div class="floater arrow">
        <a href="choose.php?friendID=<?=$friend->id;?>"><img src="/img/arrow.png"/></a>
        </div>
	</div></a>
    <div style="clear:both;"></div>
	<?
	}
?>
</div>
</div>  
    
<div class="card">    
<div class="titleOnCard">Gift someone anyway!</div>
<div><a href="choose.php"><img src="/img/giftanyway.png"/></a></div> 
<div class="centerAlign" style="padding:2%;">
    <a href="choose.php">View All Plants</a>
</div>
</div> 
    
<div class="card">    
<div class="titleOnCard">Your Forest</div>
<div><a href="forest.php"><img src="/img/yourforrest.png"/></a></div> 
<div class="centerAlign" style="padding:2%;">
    <a href="forest.php">Go to your forest</a>
</div>
</div>     


</div>

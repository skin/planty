
<div class="row">



<div class="card">
<div class="title upcoming-birthdays">Upcoming Birthdays</div>

<div class="friends">
<?
	$friends = getFriends();
  while($friend = array_shift($friends)){
	?>
	<div class="friend clearFix">
    
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
	</div>
    <div style="clear:both;"></div>
	<?
	}
?>
</div>
</div>             
<!--<div class="title gift-someone">
	<span>Gift someone anyway!</span>
</div>-->


	</div>

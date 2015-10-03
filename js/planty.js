function getRandomNumber(start,end) {
    return Math.floor(Math.random() * end) + start
}

function displayTrees(){
  $(".tree").each(function(index) {
    $(this).show();
    $(this).css("position","absolute");
    $(this).css("top",getRandomNumber(15,40)+"%");
    $(this).css("left",getRandomNumber(30,35)+"%");
  });
}

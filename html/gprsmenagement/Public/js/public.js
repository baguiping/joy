 window.onresize = function()
{
  var clientWidth = document.body.clientWidth;
  if(clientWidth < 1120)
  {
       clientWidth = 1120;
  }
  $("#bodywidth").css("width",clientWidth);
  var mainRightWidth = (clientWidth - 155) + "px";
  $("#mainRight").css("width",mainRightWidth);

} 


$(document).ready(	function()
{
  var clientWidth = document.body.clientWidth;
  if(clientWidth < 1120)
  {
      clientWidth = 1120;
  }
  $("#bodywidth").css("width",clientWidth);
  var mainRightWidth = (clientWidth - 155) + "px";
  $("#mainRight").css("width",mainRightWidth);
 });
 
 function refresh()
 {
	window.location.reload();
 } 
 
 function refreshPage(){

} 

function chgbgover(obj)
{
	$(obj).find("img").attr("src","Public/Images/abexit.png");
}
function chgbgout(obj)
{
	$(obj).find("img").attr("src","Public/Images/norexit.png");
}

function navigation(obj) 
{
	var $a = $(obj).children(0).addClass("act");

	var $pbrother = $(obj).prevAll();
	for (var i = 0; i < $pbrother.length; i++) 
	{
		if($pbrother.eq(i).children(0).hasClass("act"))
		{
			$pbrother.eq(i).children(0).removeClass();
		}
	}

	var $nbrother = $(obj).nextAll();
	for (var i = 0; i < $nbrother.length; i++) 
	{
		if($nbrother.eq(i).children(0).hasClass("act"))
		{
			$nbrother.eq(i).children(0).removeClass();
		}
	}
}
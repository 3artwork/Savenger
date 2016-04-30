function randBetween(min,max)
{
    return Math.floor(Math.random()*(max-min+1)+min);
}
function creep() {
	var bar = $(this).find(".stats_container div");
	bar.css("width", 0);
	bar.animate({
		"width" : $(this).find(".stat_num").text()+"%"
	}, randBetween(100, 500));
}
$(document).ready(function(){
	$('#stats li').each(creep);
});

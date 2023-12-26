$(document).ready(function(){
	$('.dependent').dependentSelects();
	$('#nextBtn').click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
	});
	$('#prevBtn').click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
	});
});


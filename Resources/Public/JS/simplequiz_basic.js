$(document).ready(function() {
		$('.question .openExplanation').click(function(){
			 $(this).prevAll('.explanation').toggle();
		});
});
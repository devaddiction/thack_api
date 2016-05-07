

$(document).ready(function () {
	$('#event-selector').click(function() {
		$(this).toggleClass('event-selected');
	});

	$('#search-hotels').click(function() {
		var coordinates = {};
		$.each($('#event-selector').hasClass('event-selected'), function() {
			console.log($(this).data('latitude'));
		});
		$('#event-selected').data('latitude')
	});
});

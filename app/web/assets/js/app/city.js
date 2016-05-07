$(document).ready(function () {
	$('.event-selector').on('click', function() {
		$(this).toggleClass('event-selected');
	});

	$('#search-hotels').click(function() {
		var coordinates = [];
		$.each($('.event-selected'), function() {
			coordinates.push([$(this).data('latitude'), $(this).data('longitude')])
		});
		console.log(coordinates);
	});
});

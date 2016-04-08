$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$('body').on('click', '#send', function(event) {
	event.preventDefault();
	var lines = $('#input').val().split('\n');

	$.ajax({
		url: '/cube/initialization',
		type: 'POST',
		dataType: 'json',
		data: {
			strings: lines
		},
	})
	.done(function(data) {
		console.log(data);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
});

//# sourceMappingURL=script.js.map

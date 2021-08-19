$( document ).ready (function () {
	
	/*  */
	$(".main-menu-burger").on("click", function(e) {
		$(this).toggleClass("toggled");
		if ($(this).hasClass("toggled")) {
			$("body").addClass("navbar-toggled");
		} else {
			$("body").removeClass("navbar-toggled");
		}
	});
	
	$.ajax({
		url: ajaxURL + "fetch/weather/",
		type: 'post',
		data: {city_name:city_name},
		dataType: 'json',
		beforeSend: function() {
			$("body").addClass("loading");
		},
		success: function(response) {
			$("body").removeClass("loading");
			$("#current_weather").html(response.contents);
		},
		error: function (xmlhttprequest, textstatus, message) {
			$("body").removeClass("loading");
		}
	});
	 
});
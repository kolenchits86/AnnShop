$(function() {

    $('li.cat_item a.active').parent('ul').addClass('in');

    $('.navi_line a.active').parent().css('border-top' , '3px solid #e65e63');

	$("#price_slider1, #price_slider2").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: 1000,
    from: 200,
    to: 800,
    postfix: "руб."
});

	// Свернуть развернуть строку поиска
	$(".search").click(function(){
		$(".search_form").toggle();
	});

	$(".cart").click(function(){
		$(".cart_form").toggle();
	});

	$('.navi_line ul li').addClass('animated');

	// target element
	var el = document.querySelector('.c-rating');
	// current rating, or initial rating
	var currentRating = 0;
	// max rating, i.e. number of stars you want
	var maxRating= 5;
	// callback to run after setting the rating
	//var callback = function(rating) { alert(rating); };
	// rating instance
    if (el != null) {
        var myRating = rating(el, currentRating, maxRating);
    myRating.setRating(3);
    }
	

	///////////////////////////////////////////////////////////////
// 1. Initialize fotorama manually.
    var $fotoramaDiv = jQuery('.fotorama_custom').fotorama();

    // 2. Get the API object.
    var fotorama = $fotoramaDiv.data('fotorama');


    if (jQuery('.fotorama_custom__arr').length > 0) {
        jQuery('.fotorama_custom__arr').remove();
    }
    jQuery("<div class='fotorama_custom__arr fotorama_custom__arr_prev fotorama_custom__arr--prev'><</div>").insertBefore(".fotorama_custom");
    jQuery("<div class='fotorama_custom__arr fotorama_custom__arr_next fotorama_custom__arr--next'>></div>").insertBefore(".fotorama_custom");



    jQuery('.fotorama_custom__arr--prev').click(function () {
        fotorama.show('<');
    });
    jQuery('.fotorama_custom__arr--next').click(function () {
        fotorama.show('>');
    });

    //////////////////////////////////////////////////////////////
    $('.stock .container .row div').equalHeights();
});


jQuery(document).ready(function( $ ) {
	
  /*
	 ===========================================
	 					Team
	 ===========================================
	*/
	$('.team-item').each( function() {

	 	$(this).mouseDetect({

	 		parentWidth : '100%',
	 		parentHeight : '250px',
	 		parentBgColor : '#fff',
	 		captionBgColor : '#fff',
	 		opacity 		: 1,
	 		figCaption : '.member-caption'
	 	});
	});
	$(".team-item,.testimonial,.client-review,.single-partner").on("mousedown touchstart", function(e) {
	    $(this).addClass('grabbing');
	}).on("mouseup touchend", function(e) {
	    $(this).removeClass('grabbing');
	});
		
	$('.team-item').on('mouseenter',function(){
		$('.member-skill').each(function(){
			var member = $(this);
			var percent = $(this).data('percent');
			var numberWidth = $('.skill-percent-num').width()/2;
			member.find('.skill-percent').css({
				backgroundColor : '#808080',
			});
			member.find('.skill-percent-bg').css({
				width : percent+'%',
				height : 4,
				backgroundColor : 'red',
				transition : 'all 1500ms ease'
			});
			member.find('.skill-percent-num').css({
				left : percent+'%',
				transition : 'all 1500ms ease'
			});
			member.find('.skill-percentage').css({
				left : (percent - 5)+'%',
				transition : 'all 1500ms ease'
			});
			var current = 0;
			function animateProgress() {
				setTimeout(function() {
			        if (current <= percent){
				  		member.find('.skill-percentage').html(current+'%');
				  	    current++;
			        	animateProgress();
			        }
				},14);
			};
			animateProgress();
		});
		
	}).on('mouseleave',function(){
		$('.skill-percent-bg').css({
			width : 0,
			height : 4,
			backgroundColor : '#808080',
		});
		$('.skill-percent-num').css({
			left : 0,
		});
		$('.skill-percentage').css({
			left : 0
		}).html('0%');
	});
	/*Team Slick*/
	$('.team-items').slick({
		dots: true,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 2,
		autoplay : false,
		prevArrow : "none",
        nextArrow : "none",
        responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
	  ]
	});
	
});
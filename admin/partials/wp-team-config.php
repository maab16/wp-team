<?php
$file = plugin_dir_path( __FILE__ ) . '../js/custom_script.js';
if($prev_arrow != "none")
	$prev_arrow = "<i class='controller wp-team-prev fa ".$prev_arrow. "' aria-hidden='true'></i>";
if($next_arrow != "none")
	$next_arrow = "<i class='controller wp-team-next fa ".$next_arrow. "' aria-hidden='true'></i>";
$config = <<<CONFIG
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
		dots: $dots,
		infinite: $infinite,
		slidesToShow: $slides_to_show,
		slidesToScroll: $slides_to_scroll,
		autoplay : $autoplay,
		prevArrow : "$prev_arrow",
        nextArrow : "$next_arrow",
        responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: $md_slides_to_show,
		        slidesToScroll: $md_slides_to_scroll,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: $sm_slides_to_show,
		        slidesToScroll: $sm_slides_to_scroll
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: $xs_slides_to_show,
		        slidesToScroll: $xs_slides_to_scroll
		      }
		    }
	  ]
	});
	
});
CONFIG;
// The new person to add to the file

// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $config);
?>
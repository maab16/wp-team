/**
 * hover figure caption with mouse direction
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2016 MAAB
 * http://www.github.com/maab16/hover-figure-caption-with-mouse-direction
 */
 
;(function($,window,document,undefined){
	'use strict';

	var deafults = {

					animationType 	: 'ease',
					animationDuration 	: 300,
					animationDelay 	: 0,
					parentWidth 	: '400px',
					parentHeight 	: '400px',
					parentBgColor   :  'gray',
					captionBgColor  :  '#000',
					borderRadius    :  '2px',
					opacity 		: 1,
					figure 			: '.figure',
					figCaption      : '.caption',
					leftSpace 		: 15,
					rightSpace 		: 15,
					responsive : [
	                    {
	                        breakpoint : 1280,
	                        containerWidth : 1170,
	                        settings : {
	                            nOfRow : 3,
	                            nOfColumn : 4
	                        }
	                    },
	                    {
	                        breakpoint : 980,
	                        containerWidth : 750,
	                        settings : {
	                            nOfRow : 2,
	                            nOfColumn : 2
	                        }
	                    },
	                    {
	                        breakpoint : 360,
	                        settings : {
	                            nOfRow : 1,
	                            nOfColumn : 1
	                        }
	                    }
	                ]

				}

	function mouseDetect(element,options){

		this.settings = $.extend({},deafults,options);
		this.element  = $(element);
		this.$hoverContainer = this.element.find(this.settings.figure);
		this.$hoverElem = this.element.find(this.settings.figCaption);
		this.settings.parentWidth = (this.settings.parentWidth == '100%') ? '100%' : this.settings.parentWidth ;
		this.settings.parentHeight = (this.settings.parentHeight == '100%') ? '100%' : this.settings.parentHeight ;
		
		var self = this;
        $(window).on('resize',function(){
            self.win = $(this).width();
            $.each(self.settings.responsive,function(index,responsive){
                if (self.win <= responsive.breakpoint) {
                    self.nOfColumn  = responsive.settings.nOfColumn;
                    //self.nOfRows    = responsive.settings .nOfRow;
                    self.containerWidth = responsive.containerWidth;
                }
                if (self.win <= 360) {
                    self.containerWidth = self.win;
                }
            });
          
            self.settings.parentWidth       = (self.containerWidth/self.nOfColumn)-(self.settings.leftSpace+self.settings.rightSpace);
            self.init();
        });
		this.init();
	};

	mouseDetect.prototype = {

		init : function(){
				

			 	this.$hoverContainer.css({

			 		width: this.settings.parentWidth,
					height: this.settings.parentHeight,
					backgroundColor: this.settings.parentBgColor,
					borderRadius: this.settings.borderRadius,
					position: 'relative',
					overflow: 'hidden'
			 	});

			 	this.$hoverElem.css({

			 		width: '100%',
					height: '100%',
					top : 0 + 'px',
					left  : "-100%",
					position : "absolute",
					display: 'block',
			 		backgroundColor : 'rgba('+this.getRgba(this.settings.captionBgColor,this.settings.opacity)+')',
			 		zIndex    : 9999,
			 		overflow : 'hidden',
			 	});

				this.applyAction();
		},
		getRgba : function(hex,alpha=1) {
			var r,g,b,a=alpha,
				//match = hex.match(/^#?(([0-9a-zA-Z]{3}){1,3})$/),
				match = hex.match(/^#([0-9a-f]{3}|[0-9a-f]{6})$/i),
				hex = (match !== null) ? match[1] : '000';
				//console.log(hex);

			if (hex.length == 6) {
			    r = parseInt(hex.substring(0, 2), 16);
			    g = parseInt(hex.substring(2, 4), 16);
			    b = parseInt(hex.substring(4, 6), 16);
			}else if (hex.length == 3) {
			    r = parseInt(hex.substring(0, 1) + hex.substring(0, 1), 16);
			    g = parseInt(hex.substring(1, 2) + hex.substring(1, 2), 16);
			    b = parseInt(hex.substring(2, 3) + hex.substring(2, 3), 16);
			}
			return r+','+g+','+b+','+a;
		},
		applyAction : function(){

			var self = this,
				animation = 'all '+ this.settings.animationDuration + 'ms ' + this.settings.animationType + ' ' + this.settings.animationDelay + 's';

			this.element.on('mouseenter',function(e){

				self.$hoverElem.hide();
				self.setPosition(e);
				self.$hoverElem.show();

			}).on('mouseleave',function(e){

				self.setPosition(e);

			}).on('mousemove',function(){

				self.$hoverElem.css({

						left : 0 + 'px',
						top  : 0 + 'px',
						transition: animation
				});
			});
		},
		// This funtion's Credit Goes to  http://stackoverflow.com/a/3647634
		getDirection : function(e){
			var width = this.element.width(),
				height = this.element.height();
			var x = (e.pageX - this.element.offset().left - (width/2)) * (width > height ? (height/width) : 1);
			var y = (e.pageY - this.element.offset().top - (height/2)) * (height > width ? (width/height) : 1);
				
			var direction = Math.round((((Math.atan2(y,x) * (180 / Math.PI)) + 180) / 90) + 3) %4 ;
			//var direction = Math.round(Math.atan2(y,x)/1.57079633+5)%4;
			return direction;
		},
		setPosition : function(e){

			switch(this.getDirection(e)){

				case 0 :
					// 	top
					this.$hoverElem.css({

						left : 0 + 'px',
						top  : "-100%"
					});
					break;
				case 1 :
					// Right
					this.$hoverElem.css({

						top : 0 + 'px',
						left  : "100%"
					});
					break;
				case 2 :
					// Bottom
					this.$hoverElem.css({

						left : 0 + 'px',
						top : "100%"
					});
					break;
				case 3 :
					// 	left
					this.$hoverElem.css({

						top : 0 + 'px',
						left  : "-100%"
					});
					break;
			}
		}
	};

	$.fn.mouseDetect = function(options){

		return this.each(function(){

			if (!$.data(this,'mouseDetect')) {

				$.data(this,'mouseDetect',new mouseDetect(this,options));
			}
		});
	};


})(jQuery,window,document);
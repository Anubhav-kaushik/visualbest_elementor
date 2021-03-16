(function ($) {
	'use strict';
	
	var rating = {};
	qodef.modules.rating = rating;

    rating.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitCommentRating();
	}
	
	function qodefInitCommentRating() {
		var ratingHolder = $('.qodef-comment-form-rating');

        var addActive = function (stars, ratingValue) {
            for (var i = 0; i < stars.length; i++) {
                var star = stars[i];
                if (i < ratingValue) {
                    $(star).addClass('active');
                } else {
                    $(star).removeClass('active');
                }
            }
        };

		ratingHolder.each(function() {
		    var thisHolder = $(this),
                ratingInput = thisHolder.find('.qodef-rating'),
                ratingValue = ratingInput.val(),
                stars = thisHolder.find('.qodef-star-rating');

                addActive(stars, ratingValue);

            stars.on('click', function () {
                ratingInput.val($(this).data('value')).trigger('change');
            });

            ratingInput.change(function () {
                ratingValue = ratingInput.val();
                addActive(stars, ratingValue);
            });
        });
	}
	
})(jQuery);
(function($) {
    'use strict';

    var portfolio = {};
    qodef.modules.portfolio = portfolio;
	
    portfolio.qodefOnWindowLoad = qodefOnWindowLoad;
	
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function qodefOnWindowLoad() {
		qodefPortfolioSingleFollow().init();
	}
	
	var qodefPortfolioSingleFollow = function () {
		var info = $('.qodef-follow-portfolio-info .qodef-portfolio-single-holder .qodef-ps-info-sticky-holder');
		
		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.qodef-ps-image-holder'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .qodef-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0,
				constant = 30; //30 to prevent mispositioned
		}
		
		var infoHolderPosition = function () {
			if (info.length && mediaHolderHeight >= infoHolderHeight) {
				if (qodef.scroll >= infoHolderOffset - headerHeight - qodefGlobalVars.vars.qodefAddForAdminBar - constant) {
					var marginTop = qodef.scroll - infoHolderOffset + qodefGlobalVars.vars.qodefAddForAdminBar + headerHeight + constant;
					// if scroll is initially positioned below mediaHolderHeight
					if (marginTop + infoHolderHeight > mediaHolderHeight) {
						marginTop = mediaHolderHeight - infoHolderHeight + constant;
					}
					info.stop().animate({
						marginTop: marginTop
					});
				}
			}
		};
		
		var recalculateInfoHolderPosition = function () {
			if (info.length && mediaHolderHeight >= infoHolderHeight) {
				//Calculate header height if header appears
				if (qodef.scroll > 0 && header.length) {
					headerHeight = header.height();
				}
				
				var headerMixin = headerHeight + qodefGlobalVars.vars.qodefAddForAdminBar + constant;
				if (qodef.scroll >= infoHolderOffset - headerMixin) {
					if (qodef.scroll + infoHolderHeight + headerMixin + 2 * constant < infoHolderOffset + mediaHolderHeight) {
						info.stop().animate({
							marginTop: (qodef.scroll - infoHolderOffset + headerMixin + 2 * constant)
						});
						//Reset header height
						headerHeight = 0;
					} else {
						info.stop().animate({
							marginTop: mediaHolderHeight - infoHolderHeight
						});
					}
				} else {
					info.stop().animate({
						marginTop: 0
					});
				}
			}
		};
		
		return {
			init: function () {
				infoHolderPosition();
				$(window).scroll(function () {
					recalculateInfoHolderPosition();
				});
			}
		};
	};

})(jQuery);
(function($) {
    'use strict';
	
	var accordions = {};
	qodef.modules.accordions = accordions;
	
	accordions.qodefInitAccordions = qodefInitAccordions;
	
	
	accordions.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitAccordions();
	}

    /*
	All functions to be called on $(window).load() should be in this function
	*/
    function qodefOnWindowLoad() {
        qodefElementorInitAccordions();
    }

    /**
     * Elementor
     */
    function qodefElementorInitAccordions(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_accordion.default', function() {
                qodefInitAccordions();
            } );
        });
    }

	/**
	 * Init accordions shortcode
	 */
	function qodefInitAccordions(){
		var accordion = $('.qodef-accordion-holder');
		
		if(accordion.length){
			accordion.each(function(){
				var thisAccordion = $(this);

				if(thisAccordion.hasClass('qodef-accordion')){
					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('qodef-toggle')){
					var toggleAccordion = $(this),
						toggleAccordionTitle = toggleAccordion.find('.qodef-accordion-title'),
						toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);
						
						thisTitle.on('mouseenter mouseleave', function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';
	
	var animationHolder = {};
	qodef.modules.animationHolder = animationHolder;
	
	animationHolder.qodefInitAnimationHolder = qodefInitAnimationHolder;
	
	
	animationHolder.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitAnimationHolder();
	}
	
	/*
	 *	Init animation holder shortcode
	 */
	function qodefInitAnimationHolder(){
		var elements = $('.qodef-grow-in, .qodef-fade-in-down, .qodef-element-from-fade, .qodef-element-from-left, .qodef-element-from-right, .qodef-element-from-top, .qodef-element-from-bottom, .qodef-flip-in, .qodef-x-rotate, .qodef-z-rotate, .qodef-y-translate, .qodef-fade-in, .qodef-fade-in-left-x-rotate'),
			animationClass,
			animationData,
			animationDelay;
		
		if(elements.length){
			elements.each(function(){
				var thisElement = $(this);
				
				thisElement.appear(function() {
					animationData = thisElement.data('animation');
					animationDelay = parseInt(thisElement.data('animation-delay'));
					
					if(typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						var newClass = animationClass+'-on';
						
						setTimeout(function(){
							thisElement.addClass(newClass);
						},animationDelay);
					}
				},{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var button = {};
	qodef.modules.button = button;

	button.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefButton().init();
	}

    /*
		All functions to be called on $(window).load() should be in this function
	   */
    function qodefOnWindowLoad() {
        qodefElementorButton();
    }


    /**
     * Elementor
     */
    function qodefElementorButton(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_button.default', function() {
                qodefButton().init();
            } );
        });
    }
	
	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var qodefButton = function() {
		//all buttons on the page
		var buttons = $('.qodef-btn');
		
		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function(button) {
			if(typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function(event) {
					event.data.button.css('color', event.data.color);
				};
				
				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');
				
				button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
				button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
			}
		};
		
		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function(button) {
			if(typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function(event) {
					event.data.button.css('background-color', event.data.color);
				};
				
				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');
				
				button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
				button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);
			}
		};
		
		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function(button) {
			if(typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function(event) {
					event.data.button.css('border-color', event.data.color);
				};
				
				var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');
				
				button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
				button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
			}
		};
		
		return {
			init: function() {
				if(buttons.length) {
					buttons.each(function() {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};

    button.qodefButton = qodefButton;
	
})(jQuery);
(function($) {
	'use strict';
	
	
    $(window).on('load', qodefOnWindowLoad);
    
    /*
     All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorCallToActionButton();
    }


    function qodefElementorCallToActionButton(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_call_to_action.default', function() {
                qodef.modules.button.qodefButton().init();
            } );
        });
    }
	
})(jQuery);
(function($) {
	'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
	   All functions to be called on $(window).load() should be in this function
	  */
    function qodefOnWindowLoad() {
        qodefElementorClientsCarousel();
    }

    /**
     * Elementor
     */
    function qodefElementorClientsCarousel() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/qodef_clients_carousel.default', function () {
                qodef.modules.common.qodefOwlSlider();
            });
        });
    }

})(jQuery);
(function($) {
	'use strict';
	
	var countdown = {};
	qodef.modules.countdown = countdown;
	
	countdown.qodefInitCountdown = qodefInitCountdown;
	
	
	countdown.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitCountdown();
	}

    /*
     All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorInitCountdown();
    }

    /**
     * Elementor
     */
    function qodefElementorInitCountdown(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_countdown.default', function() {
                qodefInitCountdown();
            } );
        });
    }

	/**
	 * Countdown Shortcode
	 */
	function qodefInitCountdown() {
		var countdowns = $('.qodef-countdown'),
			date = new Date(),
			currentMonth = date.getMonth(),
			year,
			month,
			day,
			hour,
			minute,
			timezone,
			monthLabel,
			dayLabel,
			hourLabel,
			minuteLabel,
			secondLabel;
		
		if (countdowns.length) {
			countdowns.each(function(){
				//Find countdown elements by id-s
				var countdownId = $(this).attr('id'),
					countdown = $('#'+countdownId),
					digitFontSize,
					labelFontSize;
				
				//Get data for countdown
				year = countdown.data('year');
				month = countdown.data('month');
				day = countdown.data('day');
				hour = countdown.data('hour');
				minute = countdown.data('minute');
				timezone = countdown.data('timezone');
				monthLabel = countdown.data('month-label');
				dayLabel = countdown.data('day-label');
				hourLabel = countdown.data('hour-label');
				minuteLabel = countdown.data('minute-label');
				secondLabel = countdown.data('second-label');
				digitFontSize = countdown.data('digit-size');
				labelFontSize = countdown.data('label-size');

				if( currentMonth !== month ) {
					month = month - 1;
				}
				
				//Initialize countdown
				countdown.countdown({
					until: new Date(year, month, day, hour, minute, 44),
					labels: ['', monthLabel, '', dayLabel, hourLabel, minuteLabel, secondLabel],
					format: 'ODHMS',
					timezone: timezone,
					padZeroes: true,
					onTick: setCountdownStyle
				});
				
				function setCountdownStyle() {
					countdown.find('.countdown-amount').css({
						'font-size' : digitFontSize+'px',
						'line-height' : digitFontSize+'px'
					});
					countdown.find('.countdown-period').css({
						'font-size' : labelFontSize+'px'
					});
				}
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var counter = {};
	qodef.modules.counter = counter;
	
	counter.qodefInitCounter = qodefInitCounter;
	
	
	counter.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitCounter();
	}

    /*
	 All functions to be called on $(window).load() should be in this function
	*/
    function qodefOnWindowLoad() {
        qodefElementorInitCounter();
    }

    /**
     * Elementor
     */
    function qodefElementorInitCounter(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_counter.default', function() {
                qodefInitCounter();
            } );
        });
    }

	/**
	 * Counter Shortcode
	 */
	function qodefInitCounter() {
		var counterHolder = $('.qodef-counter-holder');
		
		if (counterHolder.length) {
			counterHolder.each(function() {
				var thisCounterHolder = $(this),
					thisCounter = thisCounterHolder.find('.qodef-counter');
				
				thisCounterHolder.appear(function() {
					thisCounterHolder.css('opacity', '1');
					
					//Counter zero type
					if (thisCounter.hasClass('qodef-zero-counter')) {
						var max = parseFloat(thisCounter.text());
						thisCounter.countTo({
							from: 0,
							to: max,
							speed: 1500,
							refreshInterval: 100
						});
					} else {
						thisCounter.absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					}
				},{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function ($) {
	'use strict';
	
	var customFont = {};
	qodef.modules.customFont = customFont;
	
	customFont.qodefCustomFontResize = qodefCustomFontResize;
	customFont.qodefCustomFontTypeOut = qodefCustomFontTypeOut;
	
	
	customFont.qodefOnDocumentReady = qodefOnDocumentReady;
	customFont.qodefOnWindowLoad = qodefOnWindowLoad;
	
	$(document).ready(qodefOnDocumentReady);
	$(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefCustomFontResize();
	}
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function qodefOnWindowLoad() {
		qodefCustomFontTypeOut();
        qodefElementorInitCustomFont();
	}

    /**
     * Elementor
     */
    function qodefElementorInitCustomFont(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_custom_font.default', function() {
                qodefCustomFontTypeOut();
                qodefCustomFontResize();
            } );
        });
    }

	/*
	 **	Custom Font resizing style
	 */
	function qodefCustomFontResize() {
		var holder = $('.qodef-custom-font-holder');
		
		if (holder.length) {
			holder.each(function () {
				var thisItem = $(this),
					itemClass = '',
					smallLaptopStyle = '',
					ipadLandscapeStyle = '',
					ipadPortraitStyle = '',
					mobileLandscapeStyle = '',
					style = '',
					responsiveStyle = '';
				
				if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
					itemClass = thisItem.data('item-class');
				}
				
				if (typeof thisItem.data('font-size-1366') !== 'undefined' && thisItem.data('font-size-1366') !== false) {
					smallLaptopStyle += 'font-size: ' + thisItem.data('font-size-1366') + ' !important;';
				}
				if (typeof thisItem.data('font-size-1024') !== 'undefined' && thisItem.data('font-size-1024') !== false) {
					ipadLandscapeStyle += 'font-size: ' + thisItem.data('font-size-1024') + ' !important;';
				}
				if (typeof thisItem.data('font-size-768') !== 'undefined' && thisItem.data('font-size-768') !== false) {
					ipadPortraitStyle += 'font-size: ' + thisItem.data('font-size-768') + ' !important;';
				}
				if (typeof thisItem.data('font-size-680') !== 'undefined' && thisItem.data('font-size-680') !== false) {
					mobileLandscapeStyle += 'font-size: ' + thisItem.data('font-size-680') + ' !important;';
				}
				
				if (typeof thisItem.data('line-height-1366') !== 'undefined' && thisItem.data('line-height-1366') !== false) {
					smallLaptopStyle += 'line-height: ' + thisItem.data('line-height-1366') + ' !important;';
				}
				if (typeof thisItem.data('line-height-1024') !== 'undefined' && thisItem.data('line-height-1024') !== false) {
					ipadLandscapeStyle += 'line-height: ' + thisItem.data('line-height-1024') + ' !important;';
				}
				if (typeof thisItem.data('line-height-768') !== 'undefined' && thisItem.data('line-height-768') !== false) {
					ipadPortraitStyle += 'line-height: ' + thisItem.data('line-height-768') + ' !important;';
				}
				if (typeof thisItem.data('line-height-680') !== 'undefined' && thisItem.data('line-height-680') !== false) {
					mobileLandscapeStyle += 'line-height: ' + thisItem.data('line-height-680') + ' !important;';
				}
				
				if (smallLaptopStyle.length || ipadLandscapeStyle.length || ipadPortraitStyle.length || mobileLandscapeStyle.length) {
					
					if (smallLaptopStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 1366px) {.qodef-custom-font-holder." + itemClass + " { " + smallLaptopStyle + " } }";
					}
					if (ipadLandscapeStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 1024px) {.qodef-custom-font-holder." + itemClass + " { " + ipadLandscapeStyle + " } }";
					}
					if (ipadPortraitStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 768px) {.qodef-custom-font-holder." + itemClass + " { " + ipadPortraitStyle + " } }";
					}
					if (mobileLandscapeStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 680px) {.qodef-custom-font-holder." + itemClass + " { " + mobileLandscapeStyle + " } }";
					}
				}
				
				if (responsiveStyle.length) {
					style = '<style type="text/css">' + responsiveStyle + '</style>';
				}
				
				if (style.length) {
					$('head').append(style);
				}
			});
		}
	}
	
	/*
	 * Init Type out functionality for Custom Font shortcode
	 */
	function qodefCustomFontTypeOut() {
		var qodefTyped = $('.qodef-cf-typed');
		
		if (qodefTyped.length) {
			qodefTyped.each(function () {
				
				//vars
				var thisTyped = $(this),
					typedWrap = thisTyped.parent('.qodef-cf-typed-wrap'),
					customFontHolder = typedWrap.parent('.qodef-custom-font-holder'),
					str = [],
					string_1 = thisTyped.find('.qodef-cf-typed-1').text(),
					string_2 = thisTyped.find('.qodef-cf-typed-2').text(),
					string_3 = thisTyped.find('.qodef-cf-typed-3').text(),
					string_4 = thisTyped.find('.qodef-cf-typed-4').text();
				
				if (string_1.length) {
					str.push(string_1);
				}
				
				if (string_2.length) {
					str.push(string_2);
				}
				
				if (string_3.length) {
					str.push(string_3);
				}
				
				if (string_4.length) {
					str.push(string_4);
				}
				
				customFontHolder.appear(function () {
					thisTyped.typed({
						strings: str,
						typeSpeed: 90,
						backDelay: 700,
						loop: true,
						contentType: 'text',
						loopCount: false,
						cursorChar: '_'
					});
				}, {accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function ($) {
    'use strict';

    var dividedHolder = {};
    qodef.modules.dividedHolder = dividedHolder;

    dividedHolder.qodefInitDividedHolder = qodefInitDividedHolder;


    dividedHolder.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitDividedHolder().init();
    }

    /*
	 All functions to be called on $(window).load() should be in this function
	 */
    function qodefOnWindowLoad() {
        qodefElementorDividedHolder();
    }

    /**
     * Elementor
     */
    function qodefElementorDividedHolder(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_divided_holder.default', function() {
                qodefInitDividedHolder().init();
            } );
        });
    }

    /**
     * Initializes divided holder
     */
    var qodefInitDividedHolder = function () {

        var dividedHolder = $('.qodef-divided-holder');

        /**
         * Function that triggers divided holder scroll
         */
        var dividedHolderScroll = function (dHolder) {

            // divided scroll image
            var dividedHolderImage = dHolder.find('.qodef-divided-image');

            // space between image and window bottom
            var image_space_after = 0;
            if (typeof dividedHolderImage.data('image-space') !== 'undefined' && dividedHolderImage.data('image-space') !== false) {
                image_space_after = dividedHolderImage.data('image-space');
            }

            // divided text holder
            var dividedHolderInner = dHolder.find('.qodef-divided-inner');

            // header height
            var header = $('.qodef-page-header'),
                headerHeight = (header.length) ? header.height() : 0;

            // if image is higher, return function
            var allowDividedHolderScroll = dividedHolderImage.height() < dividedHolderInner.height();

            if (qodef.windowWidth > 1024 && allowDividedHolderScroll) {

                dividedHolderSize(dHolder);

                qodef.window.scroll(function () {

                    // divided text holder offset
                    var dividedHolderRepOffset = dividedHolderInner.offset().top;
                    // divided text holder height
                    var dividedHolderRepHeight = dividedHolderInner.height() + parseInt(dividedHolderInner.css('padding-top')) + parseInt(dividedHolderInner.css('padding-bottom'));

                    // this is staring value for scrolling
                    var scrollStartValue = (qodef.scroll + headerHeight) - dividedHolderRepOffset;
                    // this is ending value for scrolling
                    var scrollEndValue = (scrollStartValue + dividedHolderImage.height() + image_space_after) - (dividedHolderRepHeight);
                    // position for holder when it is fixed
                    var scrollStartingPosition = headerHeight;

                    // scrolling holder
                    if (scrollStartValue > 0 && scrollEndValue <= 0) {
                        //add class
                        if (!dividedHolderImage.hasClass('qodef-divided-image-init')) {
                            dividedHolderImage.addClass('qodef-divided-image-init');
                        }

                        //remove class
                        if (dHolder.hasClass('qodef-divided-image-after')) {
                            dHolder.removeClass('qodef-divided-image-after');
                        }

                        // scroll image
                        dividedHolderImage.css('top', scrollStartingPosition + 'px');

                        // after holder
                    } else if (scrollEndValue > 0) {

                        //remove class
                        if (dividedHolderImage.hasClass('qodef-divided-image-init')) {
                            dividedHolderImage.removeClass('qodef-divided-image-init');
                        }

                        //add class
                        if (!dHolder.hasClass('qodef-divided-image-after')) {
                            dHolder.addClass('qodef-divided-image-after');
                        }
                    } else {

                        //remove class
                        if (dividedHolderImage.hasClass('qodef-divided-image-init')) {
                            dividedHolderImage.removeClass('qodef-divided-image-init');
                        }

                        //remove class
                        if (dHolder.hasClass('qodef-divided-image-after')) {
                            dHolder.removeClass('qodef-divided-image-after');
                        }
                    }

                });


            }

            else {

            }
        };

        /**
         * Function that triggers divided holder size
         */
        var dividedHolderSize = function (dHolder) {

            // divided scroll image
            var dividedHolderImage = dHolder.find('.qodef-divided-image');

            // divided scroll image holder
            var dividedHolder = dHolder.find('.qodef-divided-image-holder');

            // space between image and window bottom
            var imageSpaceAfter = 0;
            if (typeof dividedHolderImage.data('image-space') !== 'undefined' && dividedHolderImage.data('image-space') !== false) {
                imageSpaceAfter = dividedHolderImage.data('image-space');
            }

            // header height
            var header = $('.qodef-page-header'),
                headerHeight = (header.length) ? header.height() : 0;

            dividedHolderImage.height($(window).height() - headerHeight - imageSpaceAfter);
            dividedHolderImage.css('width', dividedHolder.css('width'));
        };

        return {
            init: function () {
                if (dividedHolder.length) {
                    dividedHolder.each(function () {
                        dividedHolderScroll($(this));
                    });
                }
            }
        };

    };

})(jQuery);
(function($) {
	'use strict';

	var elementsHolder = {};
	qodef.modules.elementsHolder = elementsHolder;

	elementsHolder.qodefInitElementsHolderResponsiveStyle = qodefInitElementsHolderResponsiveStyle;


	elementsHolder.qodefOnDocumentReady = qodefOnDocumentReady;

	$(document).ready(qodefOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitElementsHolderResponsiveStyle();
	}

	/*
	 **	Elements Holder responsive style
	 */
	function qodefInitElementsHolderResponsiveStyle(){
		var elementsHolder = $('.qodef-elements-holder');

		if(elementsHolder.length){
			elementsHolder.each(function() {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.qodef-eh-item'),
					style = '',
					responsiveStyle = '';

				elementsHolderItem.each(function() {
					var thisItem = $(this),
						itemClass = '',
						largeLaptop = '',
						smallLaptop = '',
						ipadLandscape = '',
						ipadPortrait = '',
						mobileLandscape = '',
						mobilePortrait = '';

					if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
						itemClass = thisItem.data('item-class');
					}
					if (typeof thisItem.data('1367-1600') !== 'undefined' && thisItem.data('1367-1600') !== false) {
						largeLaptop = thisItem.data('1367-1600');
					}
					if (typeof thisItem.data('1025-1366') !== 'undefined' && thisItem.data('1025-1366') !== false) {
						smallLaptop = thisItem.data('1025-1366');
					}
					if (typeof thisItem.data('769-1024') !== 'undefined' && thisItem.data('769-1024') !== false) {
						ipadLandscape = thisItem.data('769-1024');
					}
					if (typeof thisItem.data('681-768') !== 'undefined' && thisItem.data('681-768') !== false) {
						ipadPortrait = thisItem.data('681-768');
					}
					if (typeof thisItem.data('680') !== 'undefined' && thisItem.data('680') !== false) {
						mobileLandscape = thisItem.data('680');
					}

					if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

						if(largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1367px) and (max-width: 1600px) {.qodef-eh-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
						}
						if(smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1025px) and (max-width: 1366px) {.qodef-eh-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
						}
						if(ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 769px) and (max-width: 1024px) {.qodef-eh-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
						}
						if(ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 681px) and (max-width: 768px) {.qodef-eh-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
						}
						if(mobileLandscape.length) {
							responsiveStyle += "@media only screen and (max-width: 680px) {.qodef-eh-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
						}
					}

                    if (typeof qodef.modules.common.qodefOwlSlider === "function") { // if owl function exist
                        var owl = thisItem.find('.qodef-owl-slider');
                        if (owl.length) { // if owl is in elements holder
                            setTimeout(function () {
                                owl.trigger('refresh.owl.carousel'); // reinit owl
                            }, 100);
                        }
                    }

				});

				if(responsiveStyle.length) {
					style = '<style type="text/css">'+responsiveStyle+'</style>';
				}

				if(style.length) {
					$('head').append(style);
				}

			});
		}
	}

})(jQuery);
(function($) {
	'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
	   All functions to be called on $(window).load() should be in this function
	  */
    function qodefOnWindowLoad() {
        qodefElementorFrameSilider();
    }

    /**
     * Elementor
     */
    function qodefElementorFrameSilider() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/qodef_frame_slider.default', function () {
                qodef.modules.common.qodefOwlSlider();
            });
        });
    }

})(jQuery);
(function($) {
	'use strict';
	
	var googleMap = {};
	qodef.modules.googleMap = googleMap;
	
	googleMap.qodefShowGoogleMap = qodefShowGoogleMap;
	
	
	googleMap.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefShowGoogleMap();
	}

    /*
	All functions to be called on $(window).load() should be in this function
	*/
    function qodefOnWindowLoad() {
        qodefElementorShowGoogleMap();
    }

    /**
     * Elementor
     */
    function qodefElementorShowGoogleMap(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_google_map.default', function() {
                qodefShowGoogleMap();
            } );
        });
    }

	/*
	 **	Show Google Map
	 */
	function qodefShowGoogleMap(){
		var googleMap = $('.qodef-google-map');
		
		if(googleMap.length){
			googleMap.each(function(){
				var element = $(this);
				
				var snazzyMapStyle = false;
				var snazzyMapCode  = '';
				if(typeof element.data('snazzy-map-style') !== 'undefined' && element.data('snazzy-map-style') === 'yes') {
					snazzyMapStyle = true;
					var snazzyMapHolder = element.parent().find('.qodef-snazzy-map'),
						snazzyMapCodes  = snazzyMapHolder.val();
					
					if( snazzyMapHolder.length && snazzyMapCodes.length ) {
						snazzyMapCode = JSON.parse( snazzyMapCodes.replace(/`{`/g, '[').replace(/`}`/g, ']').replace(/``/g, '"').replace(/`/g, '') );
					}
				}
				
				var customMapStyle;
				if(typeof element.data('custom-map-style') !== 'undefined') {
					customMapStyle = element.data('custom-map-style');
				}
				
				var colorOverlay;
				if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
					colorOverlay = element.data('color-overlay');
				}
				
				var saturation;
				if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
					saturation = element.data('saturation');
				}
				
				var lightness;
				if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
					lightness = element.data('lightness');
				}
				
				var zoom;
				if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
					zoom = element.data('zoom');
				}
				
				var pin;
				if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
					pin = element.data('pin');
				}
				
				var mapHeight;
				if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
					mapHeight = element.data('height');
				}
				
				var uniqueId;
				if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
					uniqueId = element.data('unique-id');
				}
				
				var scrollWheel;
				if(typeof element.data('scroll-wheel') !== 'undefined') {
					scrollWheel = element.data('scroll-wheel');
				}
				var addresses;
				if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
					addresses = element.data('addresses');
				}
				
				var map = "map_"+ uniqueId;
				var geocoder = "geocoder_"+ uniqueId;
				var holderId = "qodef-map-"+ uniqueId;
				
				qodefInitializeGoogleMap(snazzyMapStyle, snazzyMapCode, customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
			});
		}
	}
	
	/*
	 **	Init Google Map
	 */
	function qodefInitializeGoogleMap(snazzyMapStyle, snazzyMapCode, customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){
		
		if(typeof google !== 'object') {
			return;
		}
		
		var mapStyles = [];
		if(snazzyMapStyle && snazzyMapCode.length) {
			mapStyles = snazzyMapCode;
		} else {
			mapStyles = [
				{
					stylers: [
						{hue: color },
						{saturation: saturation},
						{lightness: lightness},
						{gamma: 1}
					]
				}
			];
		}
		
		var googleMapStyleId;
		
		if(snazzyMapStyle || customMapStyle === 'yes'){
			googleMapStyleId = 'qodef-style';
		} else {
			googleMapStyleId = google.maps.MapTypeId.ROADMAP;
		}
		
		wheel = wheel === 'yes';
		
		var qoogleMapType = new google.maps.StyledMapType(mapStyles, {name: "Google Map"});
		
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		
		if (!isNaN(height)){
			height = height + 'px';
		}
		
		var myOptions = {
			zoom: zoom,
			scrollwheel: wheel,
			center: latlng,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			scaleControl: false,
			scaleControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			streetViewControl: false,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeControl: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'qodef-style'],
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeId: googleMapStyleId
		};
		
		map = new google.maps.Map(document.getElementById(holderId), myOptions);
		map.mapTypes.set('qodef-style', qoogleMapType);
		
		var index;
		
		for (index = 0; index < data.length; ++index) {
			qodefInitializeGoogleAddress(data[index], pin, map, geocoder);
		}
		
		var holderElement = document.getElementById(holderId);
		holderElement.style.height = height;
	}
	
	/*
	 **	Init Google Map Addresses
	 */
	function qodefInitializeGoogleAddress(data, pin, map, geocoder){
		if (data === '') {
			return;
		}
		
		var contentString = '<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<div id="bodyContent">'+
			'<p>'+data+'</p>'+
			'</div>'+
			'</div>';
		
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		
		geocoder.geocode( { 'address': data}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					icon:  pin,
					title: data.store_title
				});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
				
				google.maps.event.addDomListener(window, 'resize', function() {
					map.setCenter(results[0].geometry.location);
				});
			}
		});
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var icon = {};
	qodef.modules.icon = icon;
	
	icon.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefIcon().init();
	}

    /*
     All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorIcon();
    }

    /**
     * Elementor
     */
    function qodefElementorIcon(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_icon.default', function() {
                qodefIcon().init();
            } );
        });
    }

	/**
	 * Object that represents icon shortcode
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var qodefIcon = function() {
		var icons = $('.qodef-icon-shortcode');
		
		/**
		 * Function that triggers icon animation and icon animation delay
		 */
		var iconAnimation = function(icon) {
			if(icon.hasClass('qodef-icon-animation')) {
				icon.appear(function() {
					icon.parent('.qodef-icon-animation-holder').addClass('qodef-icon-animation-show');
				}, {accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			}
		};
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var iconElement = icon.find('.qodef-icon-element');
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};
		
		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconHolderBackgroundHover = function(icon) {
			if(typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function(event) {
					event.data.icon.css('background-color', event.data.color);
				};
				
				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = icon.css('background-color');
				
				if(hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};
		
		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconHolderBorderHover = function(icon) {
			if(typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function(event) {
					event.data.icon.css('border-color', event.data.color);
				};
				
				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = icon.css('borderTopColor');
				
				if(hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconAnimation($(this));
						iconHoverColor($(this));
						iconHolderBackgroundHover($(this));
						iconHolderBorderHover($(this));
					});
				}
			}
		};
	};

    icon.qodefIcon = qodefIcon;
	
})(jQuery);
(function($) {
	'use strict';
	
	var iconListItem = {};
	qodef.modules.iconListItem = iconListItem;
	
	iconListItem.qodefInitIconList = qodefInitIconList;
	
	
	iconListItem.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitIconList().init();
	}
	
	/**
	 * Button object that initializes icon list with animation
	 * @type {Function}
	 */
	var qodefInitIconList = function() {
		var iconList = $('.qodef-animate-list');
		
		/**
		 * Initializes icon list animation
		 * @param list current slider
		 */
		var iconListInit = function(list) {
			setTimeout(function(){
				list.appear(function(){
					list.addClass('qodef-appeared');
				},{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			},30);
		};
		
		return {
			init: function() {
				if(iconList.length) {
					iconList.each(function() {
						iconListInit($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
(function($) {
	'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorIconWithText();
    }

    /**
     * Elementor
     */
    function qodefElementorIconWithText(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_icon_with_text.default', function() {
                qodef.modules.icon.qodefIcon().init();
            } );
        });
    }
	
})(jQuery);
(function($) {
	'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
	   All functions to be called on $(window).load() should be in this function
	  */
    function qodefOnWindowLoad() {
        qodefElementorImageGallery();
    }

    /**
     * Elementor
     */
    function qodefElementorImageGallery() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/qodef_image_gallery.default', function () {
                qodef.modules.common.qodefInitGridMasonryListLayout();
                qodef.modules.common.qodefOwlSlider();
            });
        });
    }

})(jQuery);
(function($) {
	'use strict';
	
	var pieChart = {};
	qodef.modules.pieChart = pieChart;
	
	pieChart.qodefInitPieChart = qodefInitPieChart;
	
	
	pieChart.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitPieChart();
	}

    /*
	  All functions to be called on $(window).load() should be in this function
	  */
    function qodefOnWindowLoad() {
        qodefElementorInitPieChart();
    }

    /**
     * Elementor
     */
    function qodefElementorInitPieChart(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_pie_chart.default', function() {
                qodefInitPieChart();
            } );
        });
    }
	
	/**
	 * Init Pie Chart shortcode
	 */
	function qodefInitPieChart() {
		var pieChartHolder = $('.qodef-pie-chart-holder');
		
		if (pieChartHolder.length) {
			pieChartHolder.each(function () {
				var thisPieChartHolder = $(this),
					pieChart = thisPieChartHolder.children('.qodef-pc-percentage'),
					barColor = '#fac400',
					trackColor = '#f4f4f4',
					lineWidth = 7,
					size = 198;
				
				if(typeof pieChart.data('size') !== 'undefined' && pieChart.data('size') !== '') {
					size = pieChart.data('size');
				}
				
				if(typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
					barColor = pieChart.data('bar-color');
				}
				
				if(typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
					trackColor = pieChart.data('track-color');
				}
				
				pieChart.appear(function() {
					initToCounterPieChart(pieChart);
					thisPieChartHolder.css('opacity', '1');
					
					pieChart.easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: lineWidth,
						animate: 1500,
						size: size
					});
				},{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			});
		}
	}
	
	/*
	 **	Counter for pie chart number from zero to defined number
	 */
	function initToCounterPieChart(pieChart){
		var counter = pieChart.find('.qodef-pc-percent'),
			max = parseFloat(counter.text());
		
		counter.countTo({
			from: 0,
			to: max,
			speed: 1500,
			refreshInterval: 50
		});
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var process = {};
	qodef.modules.process = process;
	
	process.qodefInitProcess = qodefInitProcess;
	
	
	process.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorInitProcess();
    }

    /**
     * Elementor
     */
    function qodefElementorInitProcess(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_process.default', function() {
                qodefInitProcess();
            } );
        });
    }

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitProcess();
	}
	
	/**
	 * Inti process shortcode on appear
	 */
	function qodefInitProcess() {
		var holder = $('.qodef-process-holder');
		
		if(holder.length) {
			holder.each(function(){
				var thisHolder = $(this);
				
				thisHolder.appear(function(){
					thisHolder.addClass('qodef-process-appeared');
				},{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var progressBar = {};
	qodef.modules.progressBar = progressBar;
	
	progressBar.qodefInitProgressBars = qodefInitProgressBars;
	
	
	progressBar.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitProgressBars();
	}

    /*
   All functions to be called on $(window).load() should be in this function
  */
    function qodefOnWindowLoad() {
        qodefElementorInitProgressBars();
    }

    /**
     * Elementor
     */
    function qodefElementorInitProgressBars(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_progress_bar.default', function() {
                qodefInitProgressBars();
            } );
        });
    }
	
	/*
	 **	Horizontal progress bars shortcode
	 */
	function qodefInitProgressBars() {
		var progressBar = $('.qodef-progress-bar');
		
		if (progressBar.length) {
			progressBar.each(function () {
				var thisBar = $(this),
					thisBarContent = thisBar.find('.qodef-pb-content'),
					progressBar = thisBar.find('.qodef-pb-percent'),
					percentage = thisBarContent.data('percentage');
				
				thisBar.appear(function () {
					qodefInitToCounterProgressBar(progressBar, percentage);
					
					thisBarContent.css('width', '0%').animate({'width': percentage + '%'}, 2000);
					
					if (thisBar.hasClass('qodef-pb-percent-floating')) {
						progressBar.css('left', '0%').animate({'left': percentage + '%'}, 2000);
					}
				});
			});
		}
	}
	
	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function qodefInitToCounterProgressBar(progressBar, percentageValue){
		var percentage = parseFloat(percentageValue);
		
		if(progressBar.length) {
			progressBar.each(function() {
				var thisPercent = $(this);
				thisPercent.css('opacity', '1');
				
				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 2000,
					refreshInterval: 50
				});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var tabs = {};
	qodef.modules.tabs = tabs;
	
	tabs.qodefInitTabs = qodefInitTabs;
	
	
	tabs.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitTabs();
	}

    /*
	 All functions to be called on $(window).load() should be in this function
	*/
    function qodefOnWindowLoad() {
        qodefElementorInitTabs();
    }

    /**
     * Elementor
     */
    function qodefElementorInitTabs(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_tabs.default', function() {
                qodefInitTabs();
            } );
        });
    }


    /*
     **	Init tabs shortcode
     */
	function qodefInitTabs(){
		var tabs = $('.qodef-tabs');
		
		if(tabs.length){
			tabs.each(function(){
				var thisTabs = $(this);
				
				thisTabs.children('.qodef-tab-container').each(function(index){
					index = index + 1;
					var that = $(this),
						link = that.attr('id'),
						navItem = that.parent().find('.qodef-tabs-nav li:nth-child('+index+') a'),
						navLink = navItem.attr('href');
					
					link = '#'+link;

					if(link.indexOf(navLink) > -1) {
						navItem.attr('href',link);
					}
				});
				
				thisTabs.tabs();

                $('.qodef-tabs a.qodef-external-link').off('click');
			});
		}
	}
	
})(jQuery);
(function($) {
    'use strict';

    var tripleFrameImageHighlight = {};
    qodef.modules.tripleFrameImageHighlight = tripleFrameImageHighlight;

    tripleFrameImageHighlight.qodefOnDocumentReady = qodefOnDocumentReady;
    tripleFrameImageHighlight.qodefTripleFrameImageHighlight = qodefTripleFrameImageHighlight;

    $(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefTripleFrameImageHighlight();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorTripleFrameImageHighlight();
    }

    /**
     * Elementor
     */
    function qodefElementorTripleFrameImageHighlight(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_triple_frame_image_highlight.default', function() {
                qodefTripleFrameImageHighlight();
            } );
        });
    }

    /**
     * Triple Frame Image Highlight
     */
    function qodefTripleFrameImageHighlight() {
        var tfihShortcodes = $('.qodef-triple-frame-image-highlight');

        if (tfihShortcodes.length) {
            var initClasses = function(c, l, r) {
                c.addClass('qodef-c');
                l.addClass('qodef-l');
                r.addClass('qodef-r');
            };

            var resetIndexes = function(c, l, r) {
                c.css('z-index', 30);
                l.css('z-index', 20);
                r.css('z-index', 20);
            };

            var setTriggerSize = function(holder,inner) {
                holder.find('div[class*="trigger"]').width(Math.round(inner.position().left));
            };

            var setPositioning = function(holder, inner) {
                var left = holder.find('.qodef-l'),
                    right = holder.find('.qodef-r'),
                    centered = holder.find('.qodef-c');

                var xOffset = inner.position().left;

                left.css({
                    'visibility': 'visible',
                    'transform-origin': '0% 50%',
                    'transform': 'matrix(.68,0,0,.68,-'+xOffset+',0)'
                });
                right.css({
                    'visibility': 'visible',
                    'transform-origin': '100% 50%',
                    'transform': 'matrix(.68,0,0,.68,'+xOffset+',0)'
                });
                centered.css({
                    'transform': 'matrix(1, 0, 0, 1, 0, 0)'
                });
            };

            var rotateAnimation = function(holder, inner, direction) {
                holder.data('animating', true);

                var toFront, toBack, toPrep;

                if (direction == 'left') {
                    toFront = holder.find('.qodef-l'),
                        toBack = holder.find('.qodef-c'),
                        toPrep = holder.find('.qodef-r');

                    toPrep.removeClass('qodef-r').addClass('qodef-l');
                    toBack.removeClass('qodef-c').addClass('qodef-r');
                    toFront.removeClass('qodef-l').addClass('qodef-c');
                } else {
                    toFront = holder.find('.qodef-r'),
                        toBack = holder.find('.qodef-c'),
                        toPrep = holder.find('.qodef-l');

                    toPrep.removeClass('qodef-l').addClass('qodef-r');
                    toBack.removeClass('qodef-c').addClass('qodef-l');
                    toFront.removeClass('qodef-r').addClass('qodef-c');
                }

                toPrep.css({
                    'z-index': 15,
                    'transform-origin': '0% 50%',
                    'transition': 'transform .5s, transform-origin .5s'
                });
                toBack.css({
                    'z-index': 25,
                    'transform-origin': '100% 50%',
                    'transition': 'transform 1s cubic-bezier(0.19, 1, 0.22, 1) .2s, ' +
                        'transform-origin 1s cubic-bezier(0.19, 1, 0.22, 1) .2s'
                });
                toFront.css({
                    'z-index': 20,
                    'transform-origin': '50% 50%',
                    'transition': 'transform .75s cubic-bezier(0.86, 0, 0.07, 1) .5s, ' +
                        'transform-origin .75s cubic-bezier(0.86, 0, 0.07, 1) .5s'
                });

                holder.find('a').css('pointer-events', 'none');
                setTimeout(function() {
                    holder.find('a').css('pointer-events', 'auto');
                    resetIndexes(toFront, toPrep, toBack);
                }, 500);

                toFront.one(qodef.transitionEnd, function() {
                    holder.data('animating', false);
                    clearInterval(holder.data('autoplay'));
                    holder.data('autoplay', setInterval(function() {
                        navigate(holder, inner);
                    }, 3000));
                });
            };

            var navigate = function(holder, inner, event) {
                var direction,
                    linkActive = false;

                if (typeof event !== 'undefined') {
                    switch(event.target.className) {
                        case 'qodef-tfih-left-trigger':
                            direction = 'left';
                            break;
                        case 'qodef-tfih-right-trigger':
                            direction = 'right';
                            break;
                        case 'qodef-tfih-link':
                            linkActive = true;
                            holder.data('animating', false);
                            clearInterval(holder.data('autoplay'));
                            break;
                    }
                } else {
                    direction = 'right';
                }

                if (!linkActive) {
                    rotateAnimation(holder, inner, direction);
                    setPositioning(holder, inner);
                }
            };

            tfihShortcodes.each(function() {
                var holder = $(this),
                    inner = holder.find('.qodef-tfih-inner'),
                    centeredH = holder.find('.qodef-tfih-centered-image-holder'),
                    leftH = holder.find('.qodef-tfih-left-image-holder'),
                    rightH = holder.find('.qodef-tfih-right-image-holder');

                //state
                holder
                    .data('animating', false)
                    .data('autoplay', false);

                initClasses(centeredH, leftH, rightH);
                resetIndexes(centeredH, leftH, rightH);
                setTriggerSize(holder, inner);

                holder.waitForImages(function() {
                    holder.appear(function() {
                        holder.css('visibility', 'visible');
                        setPositioning(holder, inner);
                        holder.data('autoplay', setInterval(function() {
                            navigate(holder, inner);
                        }, 3000));
                    }, {accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
                });

                holder.on('click', function(event) {
                    if (!holder.data('animating')) {
                        clearInterval(holder.data('autoplay'));
                        navigate(holder, inner, event);
                    }
                });

                if (holder.parent().hasClass('qodef-tfih-with-nav')) {
                    var left = holder.parent().find('.qodef-tfih-left'),
                        right = holder.parent().find('.qodef-tfih-right');

                    left.on('click', function() {
                        if (!holder.data('animating')) {
                            rotateAnimation(holder, inner, 'left');
                            setPositioning(holder, inner);
                        }
                    });

                    right.on('click', function() {
                        if (!holder.data('animating')) {
                            rotateAnimation(holder, inner, 'right');
                            setPositioning(holder, inner);
                        }
                    });
                }

                $(window).on('resize', function() {
                    setPositioning(holder, inner);
                    setTriggerSize(holder, inner);
                    inner.find('>div').css('transition', 'none');
                });
            });
        }
    }
})(jQuery);

(function($) {
    'use strict';

    var verticalShowcase = {};
    qodef.modules.verticalShowcase = verticalShowcase;
    verticalShowcase.qodefInitVerticalShowcase = qodefInitVerticalShowcase;

    verticalShowcase.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitVerticalShowcase();
    }

    /*
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefElementorVerticalShowcase();
    }

    /**
     * Elementor
     */
    function qodefElementorVerticalShowcase(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_vertical_showcase.default', function() {
                qodefInitVerticalShowcase();
            } );
        });
    }

    /**
     * Init vertical showcase shortcode
     */
    function qodefInitVerticalShowcase() {
        var verticalShowcase = $('.qodef-vertical-showcase');
    
        if (verticalShowcase.length) {
            verticalShowcase.each(function () {
                var holder = $(this),
                    pasepartuWrapper = $('.qodef-wrapper'),
                    item = holder.find('.qodef-vs-item'),
                    stripe = holder.find('.qodef-vs-stripe'),
                    frameImage = holder.find('.qodef-vs-inner-frame'),
                    frameInfo = holder.find('.qodef-vs-frame-info'),
                    frameSlideText = frameInfo.find('.qodef-vs-frame-slide-text'),
                    frameSlideNumber= frameInfo.find('.qodef-vs-frame-slide-number'),
                    frameTitle = frameInfo.find('.qodef-vs-frame-title'),
                    frameSubtitle = frameInfo.find('.qodef-vs-frame-subtitle'),
                    swiperInstance = holder.find('.swiper-container'),
                    swiperSlide = swiperInstance.find('.swiper-slide'),
                    lastSlide = swiperSlide.length,
                    secondLastSlide = lastSlide - 1,
                    indexCounter = 1,
                    currentActiveIndex,
                    currentActiveSlideText,
                    currentActiveTitle,
                    currentActiveSubtitle,
                    onLastSlide = false,
                    onSecondLastSlide = false,
                    currentActiveImageSrc;

                var swiperSlider = new Swiper (swiperInstance, {
                    loop: false,
                    direction: 'vertical',
                    slidesPerView: 1,
                    // mousewheel: {
                    //     invert: false,
                    //     eventsTarged: holder
                    // },
                    touchStartForcePreventDefault: true,
                    speed: 1000,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        renderBullet: function (index, className) {
                            return '<span class="' + className + '"></span>';
                        },
                    },
                    init: false
                });


                var scrollStart = false;
                swiperInstance.on('wheel', function(e) {
                    e.preventDefault();
                    if (!scrollStart) {
                        scrollStart = true;
                        var delta = e.originalEvent.deltaY;

                        if (delta > 0) {
                            swiperInstance[0].swiper.slideNext();
                        } else {
                            swiperInstance[0].swiper.slidePrev();
                        }

                        setTimeout(function() {
                            scrollStart = false;
                        }, 1000);
                    }
                });

                
                // Recalculate slider height if paspartu enabled 
                if (qodef.body.hasClass('qodef-paspartu-enabled')) {
                    var paspartuPadding = parseInt(pasepartuWrapper.css('padding'));
                    holder.css("height", "calc(100vh - " + paspartuPadding*2 + "px)");
                    swiperInstance.css("height", "calc(100vh - " + paspartuPadding*2 + "px)");
                }

                if (qodef.windowWidth < 1025) {
                    var headerHeight = $('.qodef-mobile-header-inner').css('height');
                    holder.css("height", "calc(100vh - " + headerHeight + ")");
                    swiperInstance.css("height", "calc(100vh - " + headerHeight + ")");
                    pasepartuWrapper.css('padding', 0);
                }

                holder.waitForImages(function() {
                    swiperSlider.init();
                    var rotateDegrees = 0;
                    var swiperPagination = holder.find('.swiper-pagination');
                    var swiperPaginationBullet = swiperPagination.find('.swiper-pagination-bullet');

                    swiperSlide.each(function() {
                        $(this).attr('slide-index', indexCounter);
                        $(this).data('slide-index', indexCounter);
                        indexCounter++;
                    });

                    function enableAdjacentPagination() {
                        var activeBullet = swiperPagination.find('.swiper-pagination-bullet-active');
                        swiperPaginationBullet.removeClass('bullet-clickable');
                        activeBullet.addClass('bullet-clickable');
                        activeBullet.next().addClass('bullet-clickable');
                        activeBullet.prev().addClass('bullet-clickable');
                    }

                    // function find active item
                    function findActiveItem() {
                        currentActiveIndex = swiperInstance.find('.swiper-slide-active').data('slide-index');
                        currentActiveSlideText = swiperInstance.find('.swiper-slide-active .qodef-vs-item-slide-text').text();
                        currentActiveTitle = swiperInstance.find('.swiper-slide-active .qodef-vs-item-title').text();
                        currentActiveSubtitle = swiperInstance.find('.swiper-slide-active .qodef-vs-item-subtitle').text();
                        currentActiveImageSrc = swiperInstance.find('.swiper-slide-active>.qodef-vs-item>img').attr('src');
                    }

                    function updateFrameInfo() {
                        frameImage.css('background-image', "url(" + currentActiveImageSrc + ")");
                        frameSlideText.text(currentActiveSlideText);
                        frameSlideNumber.text('0' + currentActiveIndex);
                        frameTitle.text(currentActiveTitle);
                        frameSubtitle.text(currentActiveSubtitle);
                    }

                    function readyAnimation() {
                        setTimeout(function() {
                            frameInfo.removeClass("qodef-vs-frame-animate-out");
                        }, 700);
                        holder.removeClass("qodef-vs-ready-animation");
                    }

                    // Initialize frame info when slider is ready
                    findActiveItem();
                    updateFrameInfo();
                    enableAdjacentPagination();

                    setTimeout(function() {
                        readyAnimation();
                    }, 500); 

                    swiperSlider.on('slideNextTransitionStart', function() {
                        if (!onLastSlide) {
                            rotateDegrees+=180;
                            stripe.css('transform', 'rotate('+ rotateDegrees +'deg)');
                        } 
                    });

                    swiperSlider.on('slidePrevTransitionStart', function() { 
                        if (currentActiveIndex !== secondLastSlide) {
                            rotateDegrees-=180;
                            stripe.css('transform', 'rotate('+ rotateDegrees +'deg)');
                        }
                    });

                    swiperSlider.on('slideChangeTransitionStart', function() {
                        findActiveItem();
                        enableAdjacentPagination();

                        if (currentActiveIndex == lastSlide) {
                            onLastSlide = true;
                            holder.addClass("qodef-vs-last-slide");
                        } else {
                            onLastSlide = false;
                            holder.removeClass("qodef-vs-last-slide");
                        }

                        if (!onLastSlide) {
                            frameInfo.addClass("qodef-vs-frame-animate-out");
                        
                            setTimeout(function() {
                                // if even slide move the frame info down
                                if (currentActiveIndex % 2 == 0) {
                                    frameInfo.addClass("qodef-vs-frame-even");
                                } else {
                                    frameInfo.removeClass("qodef-vs-frame-even");
                                }
                                updateFrameInfo();
                                frameInfo.removeClass("qodef-vs-frame-animate-out");
                            }, 800);
                        }
                    });
                });
            });
        }
    }

    
})(jQuery);
(function($) {
	'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
	   All functions to be called on $(window).load() should be in this function
	  */
    function qodefOnWindowLoad() {
        qodefElementorVideoButton();
    }

    /**
     * Elementor
     */
    function qodefElementorVideoButton(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_video_button.default', function() {
                qodef.modules.common.qodefPrettyPhoto();
            } );
        });
    }

})(jQuery);
(function($) {
    'use strict';
	
	var masonryGalleryList = {};
	qodef.modules.masonryGalleryList = masonryGalleryList;

    masonryGalleryList.qodefInitMasonryGallery = qodefInitMasonryGallery;

    masonryGalleryList.qodefOnDocumentReady = qodefOnDocumentReady;
	
	$(document).ready(qodefOnDocumentReady);
    $(window).on('load', qodefOnWindowLoad);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefInitMasonryGallery().init();
	}

    /*
    All functions to be called on $(window).load() should be in this function
   */
    function qodefOnWindowLoad() {
        qodefElementorMasonryGallery();
    }

    /**
     * Elementor
     */
    function qodefElementorMasonryGallery(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_masonry_gallery.default', function() {
                qodefInitMasonryGallery().init();
            } );
        });
    }

	/**
	 * Masonry gallery, init masonry and resize pictures in grid
	 */
	function qodefInitMasonryGallery() {
		var holder = $('.qodef-masonry-gallery-holder');
		
		var initMasonryGallery = function (thisHolder, size) {
			thisHolder.waitForImages(function () {
				var masonry = thisHolder.children();
				
				masonry.isotope({
					layoutMode: 'packery',
					itemSelector: '.qodef-mg-item',
					percentPosition: true,
					packery: {
						gutter: '.qodef-mg-grid-gutter',
						columnWidth: '.qodef-mg-grid-sizer'
					}
				});
				
				qodef.modules.common.setFixedImageProportionSize(thisHolder, thisHolder.find('.qodef-mg-item'), size, true);
				
				setTimeout(function () {
					qodef.modules.common.qodefInitParallax();
				}, 600);
				
				masonry.isotope( 'layout').css('opacity', '1');
			});
		};
		
		var reInitMasonryGallery = function (thisHolder, size) {
			qodef.modules.common.setFixedImageProportionSize(thisHolder, thisHolder.find('.qodef-mg-item'), size, true);
			
			thisHolder.children().isotope('reloadItems');
		};
		
		return {
			init: function () {
				if (holder.length) {
					holder.each(function () {
						var thisHolder = $(this),
							size = thisHolder.find('.qodef-mg-grid-sizer').outerWidth();
						
						initMasonryGallery(thisHolder, size);
						
						$(window).resize(function () {
							reInitMasonryGallery(thisHolder, size);
						});
					});
				}
			}
		};
	}

})(jQuery);
(function($) {
    'use strict';

    var portfolioList = {};
    qodef.modules.portfolioList = portfolioList;

    portfolioList.qodefOnWindowLoad = qodefOnWindowLoad;
    portfolioList.qodefOnWindowScroll = qodefOnWindowScroll;

    $(window).on('load', qodefOnWindowLoad);
    $(window).scroll(qodefOnWindowScroll);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefInitPortfolioFilter();
        qodefInitPortfolioListAnimation();
	    qodefInitPortfolioPagination().init();
        qodefElementorInitPortfolioList();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function qodefOnWindowScroll() {
	    qodefInitPortfolioPagination().scroll();
    }

    /**
     * Elementor
     */
    function qodefElementorInitPortfolioList(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_portfolio_list.default', function() {
                qodefInitPortfolioFilter();
                qodefInitPortfolioListAnimation();
                qodefInitPortfolioPagination().init();
                qodef.modules.common.qodefInitGridMasonryListLayout();
            } );
        });
    }
    
    /**
     * Initializes portfolio list article animation
     */
    function qodefInitPortfolioListAnimation(){
        var portList = $('.qodef-portfolio-list-holder.qodef-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.qodef-pl-inner');

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('qodef-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('qodef-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function qodefInitPortfolioFilter(){
        var filterHolder = $('.qodef-portfolio-list-holder .qodef-pl-filter-holder');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.qodef-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.qodef-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('qodef-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.qodef-pl-filter:first').addClass('qodef-pl-current');
	            
	            if(thisPortListHolder.hasClass('qodef-pl-gallery')) {
		            thisPortListInner.isotope();
	            }

                thisFilterHolder.find('.qodef-pl-filter').on('click', function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
	                    portListHasArticles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.qodef-pl-filter').removeClass('qodef-pl-current');
                    thisFilter.addClass('qodef-pl-current');
	
	                if(portListHasLoadMore && !portListHasArticles && filterValue.length) {
		                qodefInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
	                } else {
		                filterValue = filterValue.length === 0 ? '*' : filterValue;
                   
                        thisFilterHolder.parent().children('.qodef-pl-inner').isotope({ filter: filterValue });
	                    qodef.modules.common.qodefInitParallax();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function qodefInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {
        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.qodef-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = qodef.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = qodef.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'brunn_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.qodef-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('qodef-showing qodef-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: qodefGlobalVars.vars.qodefAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArticles = !!thisPortListInner.children().hasClass(filterClassName);

                        if(portListHasArticles) {
                            setTimeout(function() {
	                            qodef.modules.common.setFixedImageProportionSize(thisPortList, thisPortListInner.find('article'), thisPortListInner.find('.qodef-masonry-grid-sizer').width(), true);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('qodef-showing qodef-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
                                    qodefInitPortfolioListAnimation();
	                                qodef.modules.common.qodefInitParallax();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('qodef-showing qodef-filter-trigger');
                            qodefInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }
	
	/**
	 * Initializes portfolio pagination functions
	 */
	function qodefInitPortfolioPagination(){
		var portList = $('.qodef-portfolio-list-holder');
		
		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.qodef-pl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.qodef-pl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisPortList);
			});
		};
		
		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - qodefGlobalVars.vars.qodefAddForAdminBar;
			
			if(!thisPortList.hasClass('qodef-pl-infinite-scroll-started') && qodef.scroll + qodef.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};
		
		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.qodef-pl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}
			
			if(thisPortList.hasClass('qodef-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}
			
			if(thisPortList.hasClass('qodef-pl-pag-infinite-scroll')) {
				thisPortList.addClass('qodef-pl-infinite-scroll-started');
			}
			
			var loadMoreDatta = qodef.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.qodef-pl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages || maxNumPages === 0){
				if(thisPortList.hasClass('qodef-pl-pag-standard')) {
					loadingItem.addClass('qodef-showing qodef-standard-pag-trigger');
					thisPortList.addClass('qodef-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('qodef-showing');
				}
				
				var ajaxData = qodef.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'brunn_core_portfolio_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: qodefGlobalVars.vars.qodefAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('qodef-pl-pag-standard')) {
							nextPage++;
						}
						
						thisPortList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisPortList.hasClass('qodef-pl-pag-standard')) {
							qodefInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);
							
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('qodef-pl-masonry')){
									qodefInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('qodef-pl-gallery') && thisPortList.hasClass('qodef-pl-has-filter')) {
									qodefInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									qodefInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('qodef-pl-masonry')){
								    if(pagedLink === 1) {
                                        qodefInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    } else {
                                        qodefInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    }
								} else if (thisPortList.hasClass('qodef-pl-gallery') && thisPortList.hasClass('qodef-pl-has-filter') && pagedLink !== 1) {
									qodefInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
								    if (pagedLink === 1) {
                                        qodefInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    } else {
                                        qodefInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
                                    }
								}
							});
						}
						
						if(thisPortList.hasClass('qodef-pl-infinite-scroll-started')) {
							thisPortList.removeClass('qodef-pl-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisPortList.find('.qodef-pl-load-more-holder').hide();
			}
		};
		
		var qodefInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.qodef-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.qodef-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.qodef-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.qodef-pag-next a');
			
			standardPagNumericItem.removeClass('qodef-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('qodef-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var qodefInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.find('article').remove();
            thisPortListInner.append(responseHtml);
			qodef.modules.common.setFixedImageProportionSize(thisPortList, thisPortListInner.find('article'), thisPortListInner.find('.qodef-masonry-grid-sizer').width(), true);
            thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('qodef-showing qodef-standard-pag-trigger');
			thisPortList.removeClass('qodef-pl-pag-standard-animate');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				qodefInitPortfolioListAnimation();
				qodef.modules.common.qodefInitParallax();
				qodef.modules.common.qodefPrettyPhoto();
			}, 600);
		};
		
		var qodefInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('qodef-showing qodef-standard-pag-trigger');
			thisPortList.removeClass('qodef-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			qodefInitPortfolioListAnimation();
			qodef.modules.common.qodefInitParallax();
			qodef.modules.common.qodefPrettyPhoto();
		};
		
		var qodefInitAppendIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.append(responseHtml);
			qodef.modules.common.setFixedImageProportionSize(thisPortList, thisPortListInner.find('article'), thisPortListInner.find('.qodef-masonry-grid-sizer').width(), true);
            thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('qodef-showing');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				qodefInitPortfolioListAnimation();
				qodef.modules.common.qodefInitParallax();
				qodef.modules.common.qodefPrettyPhoto();
			}, 600);
		};
		
		var qodefInitAppendGalleryNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('qodef-showing');
			thisPortListInner.append(responseHtml);
			qodefInitPortfolioListAnimation();
			qodef.modules.common.qodefInitParallax();
			qodef.modules.common.qodefPrettyPhoto();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('qodef-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}
						
						if(thisPortList.hasClass('qodef-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}
						
						if(thisPortList.hasClass('qodef-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('qodef-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
            getMainPagFunction: function(thisPortList, paged) {
                initMainPagFunctionality(thisPortList, paged);
            }
		};
	}

})(jQuery);
(function($) {
    'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefElementorPortfolioSlider();

    }

    /**
     * Elementor Portfolio Slider
     */
    function qodefElementorPortfolioSlider() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/qodef_portfolio_slider.default', function () {
                qodef.modules.common.qodefOwlSlider();
            });
        });
    }
    

})(jQuery);
(function($) {
    'use strict';

    $(window).on('load', qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefElementorTestimonials();

    }

    /**
     * Elementor Portfolio Slider
     */
    function qodefElementorTestimonials() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/qodef_testimonials.default', function () {
                qodef.modules.common.qodefOwlSlider();
            });
        });
    }
    

})(jQuery);
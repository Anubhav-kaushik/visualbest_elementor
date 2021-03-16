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
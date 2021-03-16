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
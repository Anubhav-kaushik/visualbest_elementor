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
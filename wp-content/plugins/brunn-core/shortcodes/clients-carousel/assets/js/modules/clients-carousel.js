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
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
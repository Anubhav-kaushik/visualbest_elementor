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
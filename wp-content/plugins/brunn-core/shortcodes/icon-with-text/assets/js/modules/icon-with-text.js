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
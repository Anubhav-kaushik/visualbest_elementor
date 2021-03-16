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
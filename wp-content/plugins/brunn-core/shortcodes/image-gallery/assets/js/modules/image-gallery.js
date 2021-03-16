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
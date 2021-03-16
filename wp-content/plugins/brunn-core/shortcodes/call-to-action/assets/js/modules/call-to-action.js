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
(function($) {
    "use strict";

    $(window).on('load', qodefOnWindowLoad);

    function qodefOnWindowLoad() {
        qodefElementorPortfolioList();
    }

    function qodefElementorPortfolioList(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/qodef_product_list.default', function() {
                qodef.modules.common.qodefInitGridMasonryListLayout();
            } );
        });
    }

})(jQuery);
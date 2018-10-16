require("../css/app.scss");

import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap';
import '@fortawesome/fontawesome-free/js/brands.js';

(function ($) {
    $('.toggler-menu').on('click', function() {
        $('.body-wrapper .page-wrapper .content-wrapper').toggleClass("content-wrapper-minimized");
        $('.body-wrapper .floating-panel').toggleClass("floating-panel-open");
    })
})(jQuery);

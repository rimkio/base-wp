// Put any external JS or custom JS you wish for the theme here.

import "core-js/stable";
import './package'

(function (w, $, wp) {
    const setValueCssIEGap = () => {
        if ($('.wp-block-my-block-gap').length != 0) {
            $(".wp-block-my-block-gap").each(function (index) {
                let dataDF = $(this).data('size-default');
                let dataTablet = $(this).data('size-tablet');
                let dataMobile = $(this).data('size-mobile');
                $(this).css('height', dataDF);
                if ($(window).width() < 768) {
                    $(this).css('height', dataTablet);
                }
                if ($(window).width() < 425) {
                    $(this).css('height', dataMobile);
                }
            });
        }
    }

    // Document ready
    $(() => {
        AOS.init({once: true});
        let socials = document.querySelectorAll('.wp-block-social-links a');
        socials.forEach(function (vl, key) {
            vl.target = "_blank"
        })
    })
    // Browser load completed
    $(w).load(function () {
        let ua = window.navigator.userAgent;
        let isIE = /MSIE|Trident|Edge\//.test(ua);

        if (isIE) {
            setValueCssIEGap();
            $(window).resize(function () {
                setValueCssIEGap();
            });
        }
    });
})(window, jQuery, window.wp);

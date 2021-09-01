/**
 * flip_base
 *
 */

;((w, $) => {
    'use strict'

    const MobileToggleMenu = () => {
        $('body').on('click', '.navigation-icon', function (e) {
            e.preventDefault();
            $('body').toggleClass('__menu-mobi-open')
        })
        //$('.__menu-mobi-open .main-header').on('click', 'a.nav-link', function (e) {
        //    $('.navigation-icon').trigger('click')
        //})

        $(document).on('click', function (e) {
            //console.log(e.target)
            if ($(e.target).hasClass('navigation-cover')) {
                $('body').removeClass('__menu-mobi-open')
            }
        })
        $('.main-menu').on('click', '.menu-item.menu-item-has-children', function (e) {
            //e.preventDefault();
            e.stopPropagation()
            if ($(e.target).is('a, a *')) return;
            //console.log($(this).parent('.sub-menu').length, this)

            $(this).toggleClass('__open-submenu');
            $(this).find('>.sub-menu').slideToggle();
        })
    }

    const Ready = () => {
        MobileToggleMenu();
    }
    $(document).on('nfFormReady', function () {

    });
    // Browser load completed
    $(w).load(function () {

    });
    $(Ready)

})(window, jQuery)

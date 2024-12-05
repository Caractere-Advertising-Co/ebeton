$(document).ready(function () {
    const openMenu = $('.open_the_Mmenu');
    const megaMenu = $('#megamenu');
    const logoWhite = $('.logo-white');
    const header = $('#header.dark-theme');
    const labelToggle = $('.labelToggle');

    // Utilisation correcte de jQuery pour gérer les événements
    openMenu.on('click', function () {
        megaMenu.toggleClass('is_open');
        openMenu.toggleClass('active');


        if (header.length) {
            header.toggleClass('is_fixed dark-theme');
        }

        if (logoWhite.length) {
            logoWhite.toggleClass('hide');
        }

        labelToggle.each(function () {
            $(this).toggleClass('active');
        });
    });

    // Gestion des sous-menus
    function openSubMenu() {
        $('.menu-item').each(function () {
            const subMenu = $(this).find('.sub-menu');
            if ($(this).is(':hover')) {
                subMenu.addClass('active');
                
            } else {
                subMenu.removeClass('active');
            }
        });
    }

    function closeSubMenu() {
        $('.sub-menu').removeClass('active');
    }

    // Gestion des événements sur le menu principal
    const mainMenuContainer = $('.menu-principal-container');

    mainMenuContainer.on('mouseleave', closeSubMenu);

    mainMenuContainer.on('click', function (e) {
        e.stopPropagation();
        closeSubMenu();
    });

    // Désactiver les sous-menus lorsqu'on clique en dehors
    $(document).on('click', closeSubMenu);

    // Gestion des événements sur chaque élément de menu
    $('.menu-item').on('mouseover', openSubMenu);

    // Gestion des liens du mégamenu
    $('.menu a').on('click', function () {
        megaMenu.toggleClass('is_open');

        if (header.length) {
            header.toggleClass('is_fixed dark-theme');
        }

        if (logoWhite.length) {
            logoWhite.toggleClass('hide');
        }
    });
});

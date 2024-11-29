document.addEventListener('DOMContentLoaded', function() {
    const openMenu = document.querySelector('.open_the_Mmenu');
    const megaMenu = document.querySelector('#megamenu');

    const logoWhite = document.querySelector('.logo-white');

    const header = document.querySelector('#header.dark-theme');
    const labelToggle = document.querySelectorAll('.labelToggle');

    openMenu.addEventListener('click', function(e){
        megaMenu.classList.toggle('is_open');

        if(header){
            header.classList.toggle('is_fixed');
            header.classList.toggle('dark-theme');  
        }
        
        if(logoWhite){
            logoWhite.classList.toggle('hide');
        }


        labelToggle.forEach(element => {
            element.classList.toggle('active');
        });
    })    
    
    // Affichage élément submenu
    function openSubMenu() {
        // Désactiver tous les sous-menus, sauf celui du parent survolé
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(function(item) {
            const subMenu = item.querySelector('.sub-menu');
            if (subMenu && item.matches(':hover')) {
                subMenu.classList.add('active');
            } else if (subMenu) {
                subMenu.classList.remove('active');
            }
        });
    }
    
    function closeSubMenu() {
        const subMenus = document.querySelectorAll('.sub-menu');
        subMenus.forEach(function(menu) {
            menu.classList.remove('active');
        });
    }

    // Gestion des événements sur le menu principal
    const mainMenuContainer = document.querySelector('.menu-principal-container');

    mainMenuContainer.addEventListener('mouseleave', function() {
        closeSubMenu();
    });

    mainMenuContainer.addEventListener('click', function(e) {
        e.stopPropagation();
        closeSubMenu();
    });

    // Désactiver les sous-menus lorsque l'on clique en dehors du menu principal
    document.addEventListener('click', function() {
        closeSubMenu();
    });

    // Gestion des événements sur chaque élément du menu
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(function(item) {
        item.addEventListener('mouseover', openSubMenu);
    });

    const megaMenulinks = document.querySelectorAll('.menu a');

    megaMenulinks.forEach(function(item){
        item.addEventListener('click', function(){
            megaMenu.classList.toggle('is_open');

            if(header){
                header.classList.toggle('is_fixed');
                header.classList.toggle('dark-theme');  
            }
            
            if(logoWhite){
                logoWhite.classList.toggle('hide');
            }
            //alert('hello');
        });
    });
    
});

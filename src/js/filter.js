document.addEventListener('DOMContentLoaded', function() {
    const filters = document.querySelectorAll('.filter');
    const items = document.querySelectorAll('.grid-chantier a');

    filters.forEach(function(filter) {
        filter.addEventListener('click', function() {
            const selectedFilter = this.getAttribute('data-filter');

            filters.forEach(function(f) {
                if (f !== filter) {
                    f.classList.remove('active');
                }
            });

            items.forEach(function(item) {
                const itemFilters = item.getAttribute('data-filters').split(' ');
                if (itemFilters.includes(selectedFilter) || selectedFilter === 'all') {
                    item.style.transform = 'scale(1)';
                    item.style.transition = 'transform ease-in 300ms, opacity ease-in 300ms';
                    item.style.opacity = '1';
                    item.style.display = 'inline-block';
                } else {
                    item.style.transform = 'scale(0)';
                    item.style.opacity = '0';
                    item.style.transition = 'transform ease-out 300ms, opacity ease-out 300ms';
                    setTimeout(function() {
                        item.style.display = 'none';
                    }, 200); // Attendre la fin de la transition avant de masquer l'élément
                }
            });

            filter.classList.add('active');
        });
    });
});

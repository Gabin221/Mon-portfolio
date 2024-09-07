// Sélectionnez les éléments nécessaires
const menuCheckbox = document.getElementById('menu-checkbox');
const menuItems = document.querySelectorAll('.menu-item');

// Fonction pour fermer le menu
function closeMenu() {
    menuCheckbox.checked = false; // Décocher la case pour fermer le menu
}

// Ajoutez un écouteur d'événement à chaque élément de menu
menuItems.forEach(item => {
    item.addEventListener('click', closeMenu);
});

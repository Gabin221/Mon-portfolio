document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.querySelector('.nav-container .checkbox');

    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            // Empêche le scroll
            document.body.style.overflow = 'hidden';
        } else {
            // Rétablit le scroll
            document.body.style.overflow = 'auto';
        }
    });
});

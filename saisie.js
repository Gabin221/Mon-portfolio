document.addEventListener('DOMContentLoaded', function () {
    const text = "Bienvenue sur le portfolio de Gabin Serrurot, développeur passionné par le code.";
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            document.getElementById('typewriter').textContent += text.charAt(index);
            index++;
            setTimeout(typeWriter, 50);
        }
    }

    typeWriter();

    // Smooth scroll for menu links
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
            
            document.querySelectorAll('nav a').forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Menu toggle
    document.querySelector('.menu-toggle').addEventListener('click', function () {
        document.querySelector('header nav').classList.toggle('active');
    });
});

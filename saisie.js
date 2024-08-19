document.addEventListener('DOMContentLoaded', function () {
    const text = `Gabin Serrurot-Portfolio`;
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            if (text.charAt(index) == "-") {
                document.getElementById('typewriter').innerHTML += `<br> - <br>`;
            } else {
                document.getElementById('typewriter').innerHTML += text.charAt(index);
            }
            index++;
            setTimeout(typeWriter, 70);
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
    // document.querySelector('.menu-toggle').addEventListener('click', function () {
    //     document.querySelector('header nav').classList.toggle('active');
    // });
});

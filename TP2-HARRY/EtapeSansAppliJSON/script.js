// script.js
document.addEventListener('DOMContentLoaded', function () {
    var locations = document.querySelectorAll('.location');
    locations.display = "block";
    var nb_locations = locations.length,
        angle_rotation = 360 / nb_locations,
        first = 0;
    var dist = document.querySelector('.clock').clientWidth / 2;

    locations.forEach((location) => {
        location.classList.add("active")

        var angle = first;
        var x = Math.cos(angle * Math.PI / -180) * dist;
        var y = Math.sin(angle * Math.PI / -180) * dist;

        location.setAttribute("style", 'left: calc(42.5% + ' + x + 'px); top: calc(42.5% + ' + y + 'px)');
        location.setAttribute("data-angle", first);

        //on déplace ici 
        first += angle_rotation;
    })

    const aiguilles = document.querySelectorAll('.aiguille');
    aiguilles.forEach(aiguille => {
        const lieu = aiguille.getAttribute('data-lieu');




        const locationElement = document.getElementById(lieu);
        const angle = locationElement.getAttribute('data-angle');
        aiguille.style.transform = `rotate(-${angle}deg)`;
    });
});

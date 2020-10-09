window.addEventListener('load', function () {
    new Glider(document.querySelector('.glider'), {
        // new Glider(document.querySelector('.glider'), {
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }
        // });
    })

})


// function initMap() {
//     var location = { lat: 27.671553, lng: 85.319126 };
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 18,
//         center: location
//     });

//     var marker = new google.maps.Marker({
//         position: location,
//         map: map
//     });
// }                
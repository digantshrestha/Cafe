
window.addEventListener('load', function () {
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 3,
        slidesToScroll: 2,
        draggable: true,
        dots: '.dots',
        rewind: true,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        },
        responsive: [
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 590,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 315,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // new Glider(document.querySelector('.glider3'), {
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     draggable: true,
    //     dots: '.dots',
    //     rewind: true,
    //     arrows: {
    //         prev: '.glider-prev',
    //         next: '.glider-next'
    //     },
    //     responsive: [
    //         {
    //             breakpoint: 765,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1
    //             }
    //         },
    //         {
    //             breakpoint: 590,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1
    //             }
    //         },
    //         {
    //             breakpoint: 315,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1
    //             }
    //         }
    //     ]
    // });

    // sliderAuto(new Glider(document.querySelector('.glider2'), {
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     draggable: true,
    //     rewind: true
    //     // dots: '.dots'
    // }), 3000);

});


function sliderAuto(slider, miliseconds) {
    const slidesCount = slider.track.childElementCount;
    let slideTimeout = null;
    let nextIndex = 1;

    function slide() {
        slideTimeout = setTimeout(
            function () {
                if (nextIndex >= slidesCount) {
                    nextIndex = 0;
                }
                slider.scrollItem(nextIndex++);
            },
            miliseconds
        );
    }

    slider.ele.addEventListener('glider-animated', function () {
        window.clearInterval(slideTimeout);
        slide();
    });

    slide();
}







var about = document.getElementById('about');
var data = about.textContent;
var dataLength = data.length;

var more = document.querySelector('.more');

var infoMap = document.querySelector('.col-8');
var infoAbout = document.getElementById('aboutId');

if (screen.width < 800) {
    infoMap.className = 'mapContainer col-12';
    infoAbout.className = 'about col-12';

    if (dataLength > 500) {
        about.textContent = data.substring(0, 499);
        more.style.display = "block";
    }
    else {
        more.style.display = "none";
    }
}
else {
    if (screen.width > 800 && dataLength > 290) {
        about.textContent = data.substring(0, 289);
        more.style.display = "block";
    }
    else {
        more.style.display = "none";
    }
}







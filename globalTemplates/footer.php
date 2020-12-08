<footer>
    <p><?php echo $brandName['brandname']; ?> &copy; 2020</p>
</footer>
  <!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVzTaQzz2AA1l4TB_LGoe1O7RP3OdgY34&callback=initMap"></script> -->

  <script src="/glider.js"></script>

  <script src="bootstrap/js/jquery.slim.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>

  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
window.addEventListener('load', function () {
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 3,
        slidesToScroll: 3,
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
                    slidesToScroll: 3
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

    new Glider(document.querySelector('.glider3'), {
        slidesToShow: 3,
        slidesToScroll: 1,
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

    sliderAuto(new Glider(document.querySelector('.glider2'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        rewind: true
        // dots: '.dots'
    }), 3000);

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

  </script>
  <script src="/main.js"></script>

</body>

</html>
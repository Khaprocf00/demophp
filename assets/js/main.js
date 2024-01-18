$(document).ready(function () {
    $('.owl-carousel1').owlCarousel({
        items: 2,
        loop: true,
        merge: true,
        nav: true,
        navText: ["<div style='z-index: 999;' class='chevron-left owl-prev1'> <img src = 'assets/images/svg/Vectorchevron-left.svg' alt=''></div> ", "<div class='chevron-right owl-next1'> <img src='assets/images/svg/vectorchevron-right.svg' alt=''> </div> "],
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin: 16,
        responsive: {
            300: {
                items: 2,
                mergeFit: true,
                margin: 5,

            },
            678: {
                margin: 20,
                items: 3,
                mergeFit: true
            },
            900: {
                items: 5,
                mergeFit: false
            }
        }
    });
    $('.owl-prev1').click(() => owl.trigger('next.owl.carousel'))
    $('.owl-next1').click(() => owl.trigger('prev.owl.carousel'))


    $('.owl-carousel2').owlCarousel({
        items: 5,
        loop: true,
        merge: true,
        nav: true,
        navText: ["<div style='z-index: 999;' class='chevron-left owl-prev2'> <img src = 'assets/images/svg/Vectorchevron-left.svg' alt=''></div> ", "<div class='chevron-right owl-next2'> <img src='assets/images/svg/vectorchevron-right.svg' alt=''> </div> "],
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        margin: 16,
        responsive: {
            300: {
                items: 2,
                mergeFit: true,
                margin: 5,
            },
            678: {
                items: 3,
                mergeFit: true
            },
            1000: {
                items: 5,
                mergeFit: false
            }

        }

    });
    $('.owl-prev2').click(() => owl.trigger('next.owl.carousel'))
    $('.owl-next2').click(() => owl.trigger('prev.owl.carousel'))

    //MENU
    if ($('#header .menu') != null) {
        $('#header .menu').click(() => {
            $('#menu').addClass("active");
            $('.bg-menu').addClass("active");
            $('.bg-menu').removeClass("close");
        })
    }
    if ($('.close') != null) {

        $('.close').click(() => {
            $('#menu').removeClass("active");
            $('.bg-menu').removeClass("active");
            $('.bg-menu').addClass("close");
        })
    }
    if ($('#menu') != null) {
        $('#menu').click(() => {
            $('#menu').removeClass("active");
            $('.bg-menu').removeClass("active");
        })
    }

    $('#header .find .searchButton').click(() => {
        const dot = $('#header .find.active')
        if (dot.length == 0) {
            $('#header .find').addClass("active");
        } else {
            $('#header .find').removeClass("active");
        }
    })


    $('.comment-carousel').owlCarousel({
        items: 3,
        loop: true,
        merge: true,
        // autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        margin: 26,
        responsive: {
            300: {
                items: 1,
                mergeFit: true
            },
            678: {
                items: 2,
                mergeFit: true
            },
            1000: {
                mergeFit: false
            }
        }

    });
    $('.outstanding-owl-carousel').owlCarousel({
        items: 2,
        loop: true,
        merge: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        margin: 10,
        responsive: {
            300: {
                items: 1,
                mergeFit: true,
                margin: 5,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
            },
            678: {
                items: 2,
                mergeFit: true
            },
            1000: {
                items: 2,
                mergeFit: false
            }

        }

    });

    let items = document.querySelectorAll('.slider .item');
    let dots = document.querySelectorAll('.dots .dot');

    let active = 0;
    function loadShow() {
        let stt = 0;
        items[active].style.transform = `none`;
        items[active].style.zIndex = 1;
        items[active].style.opacity = 1;
        for (var i = active + 1; i < items.length; i++) {
            stt++;
            items[i].style.transform = `translateX(${110 * stt}px) scale(${1 - 0.2 * stt}) perspective(16px)`;
            items[i].style.zIndex = -stt;
            items[i].style.opacity = stt > 1 ? 0 : 0.6;
        }
        stt = 0;
        for (var i = active - 1; i >= 0; i--) {
            stt++;
            items[i].style.transform = `translateX(${-110 * stt}px) scale(${1 - 0.2 * stt}) perspective(16px)`;
            items[i].style.zIndex = -stt;
            items[i].style.opacity = stt > 1 ? 0 : 0.6;
        }
    }
    loadShow();
    dots.forEach((value, index) => {
        value.addEventListener("click", function () {
            active = index;
            loadShow()
            console.log(index)
            const dotactive = document.querySelector('.dot.active');
            dotactive.classList.remove('active')
            dots[index].classList.add('active')
        })
    })
    function slideAuto() {
        if (active < items.length - 1)
            active = active + 1;
        else {
            active = 0;
        }
        const dotactive = document.querySelector('.dot.active');
        dotactive.classList.remove('active')
        dots[active].classList.add('active')
        loadShow();
    }
    setInterval(slideAuto, 2000)

})


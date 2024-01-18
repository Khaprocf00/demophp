$(document).ready(function () {
    $('.image-detail-carousel').owlCarousel({
        items: 5,
        // loop: true,
        // merge: true,
        // autoplay: true,
        // autoplayTimeout: 1000,
        // autoplayHoverPause: true,
        margin: 10,
        responsive: {
            300: {
                items: 3,
                margin: 5,

            },
            678: {
                margin: 20,
                items: 3,
            },
            900: {
                items: 5,
            }

        }

    });
})
const day = document.getElementById('day')
const hour = document.getElementById('hour')
const minus = document.getElementById('minus')
const second = document.getElementById('second')

var time = function () {
    if (Number(second.innerHTML) == 0) {
        second.innerHTML = 60;
        if (Number(minus.innerHTML) == 0) {
            minus.innerHTML = 59;
            if (Number(hour.innerHTML) == 0) {
                hour.innerHTML = 23;
                day.innerHTML = Number(day.innerHTML) - 1;
            }
            else
                hour.innerHTML = Number(hour.innerHTML) - 1;
        }
        else
            minus.innerHTML = Number(minus.innerHTML) - 1;
    }
    else {
        var x = Number(second.innerHTML)
        x = x - 1;
        second.innerHTML = x;
    }
}
setInterval(time, 1000);



$('.product-info__tab-link').click(function () {

    var tabID = $(this).attr('data-tab');

    $(this).addClass('active').siblings().removeClass('active');

    $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
});


//read more
$('#tab-all').readmore({
    speed: 10000,
    collapsedHeight: 700,
    heightMargin: 30,
    lessLink: '<div class="bg-btn-more"><div class="btn-more center">Thu gọn <i class="fa-solid fa-chevron-up"></i></div></div>',
    moreLink: '<div class="bg-btn-more"><div class="btn-more center">xem thêm nội dung <i class="fa-solid fa-angles-down"></i></div></div>'
});

$('.product-evalute-more').readmore({
    speed: 10000,
    collapsedHeight: 500,
    heightMargin: 30,
    lessLink: '<div class="bg-btn-more-evalute"><div class="btn-more-evalute center">Thu gọn <i class="fa-solid fa-chevron-up"></i></div></div>',
    moreLink: '<div class="bg-btn-more-evalute"><div class="btn-more-evalute center">xem thêm comment <i class="fa-solid fa-angles-down"></i></div></div>'
})
$('.other-product-owl-carousel').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    margin: 5,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
})

$('.js-image-detail').on({
    'click': function () {
        $('.js-image-main').attr('src', $(this).attr('src'));
    }
});
$('.category__choose-item').on({
    'click': function () {
        var dataQty = $(this).attr('data-qty');
        console.log(dataQty);
        $('.category__choose-item.active').removeClass('active')
        $(this).addClass('active')
        if (dataQty == 0) {
            $('.showQty').innerHTML = '<button class="btn btn-danger">HẾT HÀNG</button>';
        }
        else {
            $('.showQty').innerHTML = 'Còn ' + dataQty + ' sản phẩm';
            console.log($('.showQty').val());
        }

    }
})
$('.js-qty-plus').click(() => {
    $('.js-qty').val(parseInt($('input[name=qty]').val()) + 1)
})
$('.js-qty-minus').click(() => {
    if ($('.js-qty').val() <= 0) {
        $('.js-qty').val(0)
    }
    else {
        $('.js-qty').val(parseInt($('input[name=qty]').val()) - 1)
    }
})



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

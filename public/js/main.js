$(document).ready(function (argument) {
    // ===========================================
    // ===========================================
    $('.owl-news .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        autoHeight: true,
        navText: [`<svg xmlns="http://www.w3.org/2000/svg" width="9.679" height="17.013" viewBox="0 0 9.679 17.013"><path d="M24.306,29.177l-7.371-7.371a1.134,1.134,0,0,1-.261-.372,1.163,1.163,0,0,1,0-.819,1.134,1.134,0,0,1,.261-.372l7.408-7.408a1.124,1.124,0,0,1,1.6,0,1.053,1.053,0,0,1,.316.819,1.182,1.182,0,0,1-.354.819l-6.552,6.552,6.589,6.589a1.08,1.08,0,0,1,0,1.564,1.169,1.169,0,0,1-1.638,0Z" transform="translate(-16.6 -12.5)" fill="rgba(28, 61, 129, 1)"/></svg>`, `<svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="17.012" viewBox="0 0 9.68 17.012"><path d="M18.573,29.177l7.371-7.371a1.134,1.134,0,0,0,.261-.372,1.163,1.163,0,0,0,0-.819,1.134,1.134,0,0,0-.261-.372l-7.409-7.408a1.124,1.124,0,0,0-1.6,0,1.053,1.053,0,0,0-.316.819,1.182,1.182,0,0,0,.354.819l6.552,6.552-6.59,6.589a1.079,1.079,0,0,0,0,1.564,1.169,1.169,0,0,0,1.638,0Z" transform="translate(-16.6 -12.5)" fill="rgba(28, 61, 129, 1)"/></svg>`],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    // ===========================================
    let name = $('.region-name span');
    let title;
    $('.region-in svg path').mouseenter(function (argument) {
        title = $(this).attr('title');
        name.text(title);
    })
    $('.region-in svg path').click(function (argument) {
        $('.region-in svg path').removeClass('active');
        $(this).addClass('active');
    })
    $('.region-in svg path').mouseleave(function (argument) {
        name.text('');
    })
    // ===========================================
    let width = $(document).width();
    if (width >= 1200) {
        $('.lang').mouseenter(function (argument) {
            $(this).children('.dropdown').children('.dropdown-menu').addClass('show');
        })
        $('.lang').mouseleave(function (argument) {
            $(this).children('.dropdown').children('.dropdown-menu').removeClass('show');
        })
        $('.menu .dropdown').mouseenter(function (argument) {
            $(this).children('.dropdown-menu').addClass('show');
        })
        $('.menu .dropdown').mouseleave(function (argument) {
            $(this).children('.dropdown-menu').removeClass('show');
        })
    }
    // ===========================================
    $('.owl-post .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:true,
        autoHeight: true,
        navText: [`<svg xmlns="http://www.w3.org/2000/svg" width="9.679" height="17.013" viewBox="0 0 9.679 17.013"><path d="M24.306,29.177l-7.371-7.371a1.134,1.134,0,0,1-.261-.372,1.163,1.163,0,0,1,0-.819,1.134,1.134,0,0,1,.261-.372l7.408-7.408a1.124,1.124,0,0,1,1.6,0,1.053,1.053,0,0,1,.316.819,1.182,1.182,0,0,1-.354.819l-6.552,6.552,6.589,6.589a1.08,1.08,0,0,1,0,1.564,1.169,1.169,0,0,1-1.638,0Z" transform="translate(-16.6 -12.5)" fill="#fff"/></svg>`, `<svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="17.012" viewBox="0 0 9.68 17.012"><path d="M18.573,29.177l7.371-7.371a1.134,1.134,0,0,0,.261-.372,1.163,1.163,0,0,0,0-.819,1.134,1.134,0,0,0-.261-.372l-7.409-7.408a1.124,1.124,0,0,0-1.6,0,1.053,1.053,0,0,0-.316.819,1.182,1.182,0,0,0,.354.819l6.552,6.552-6.59,6.589a1.079,1.079,0,0,0,0,1.564,1.169,1.169,0,0,0,1.638,0Z" transform="translate(-16.6 -12.5)" fill="#fff"/></svg>`],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1
            },
            1200:{
                items:1,
            }
        }
    })
    // ===========================================
    var owl = $('.region-right .owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        URLhashListener:true,
        startPosition: 'URLHash',
        autoHeight: true,
        navText: [`<svg xmlns="http://www.w3.org/2000/svg" width="9.679" height="17.013" viewBox="0 0 9.679 17.013"><path d="M24.306,29.177l-7.371-7.371a1.134,1.134,0,0,1-.261-.372,1.163,1.163,0,0,1,0-.819,1.134,1.134,0,0,1,.261-.372l7.408-7.408a1.124,1.124,0,0,1,1.6,0,1.053,1.053,0,0,1,.316.819,1.182,1.182,0,0,1-.354.819l-6.552,6.552,6.589,6.589a1.08,1.08,0,0,1,0,1.564,1.169,1.169,0,0,1-1.638,0Z" transform="translate(-16.6 -12.5)" fill="#fff"/></svg>`, `<svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="17.012" viewBox="0 0 9.68 17.012"><path d="M18.573,29.177l7.371-7.371a1.134,1.134,0,0,0,.261-.372,1.163,1.163,0,0,0,0-.819,1.134,1.134,0,0,0-.261-.372l-7.409-7.408a1.124,1.124,0,0,0-1.6,0,1.053,1.053,0,0,0-.316.819,1.182,1.182,0,0,0,.354.819l6.552,6.552-6.59,6.589a1.079,1.079,0,0,0,0,1.564,1.169,1.169,0,0,0,1.638,0Z" transform="translate(-16.6 -12.5)" fill="#fff"/></svg>`],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    owl.on('changed.owl.carousel', function (property) {
        var current = property.item.index;
        var id = $(property.target).find(".owl-item").eq(current).find(".item").data('id');
        $('.region-in svg path').removeClass('active');
        $('#' + id).addClass('active');
    })

    // ===========================================
    $('.owl-media .owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay: true,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="21.4" height="38.3" viewBox="0 0 21.4 38.3"><path d="M18.6,42.6,1.05,25.05a1.524,1.524,0,0,1-.35-.5,1.562,1.562,0,0,1,0-1.1,1.524,1.524,0,0,1,.35-.5L18.6,5.4a2.057,2.057,0,0,1,2.8,0,1.992,1.992,0,0,1,0,2.85L5.65,24,21.4,39.75a1.861,1.861,0,0,1,.575,1.425,2.006,2.006,0,0,1-2,1.975A1.866,1.866,0,0,1,18.6,42.6Z" transform="translate(-0.6 -4.85)"/></svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="21.4" height="38.3" viewBox="0 0 21.4 38.3"><path d="M4,42.6,21.55,25.05a1.524,1.524,0,0,0,.35-.5,1.562,1.562,0,0,0,0-1.1,1.524,1.524,0,0,0-.35-.5L4,5.4a1.9,1.9,0,0,0-1.4-.55,1.9,1.9,0,0,0-1.4.55,1.992,1.992,0,0,0,0,2.85L16.95,24,1.2,39.75a1.861,1.861,0,0,0-.575,1.425A1.954,1.954,0,0,0,1.2,42.55a1.947,1.947,0,0,0,1.425.6A1.866,1.866,0,0,0,4,42.6Z" transform="translate(-0.6 -4.85)"/></svg>'],
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            },
            1500:{
                items:5
            }
        }
    })
    // ===========================================
    $('.owl-partners .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        autoplay: true,
        navText: [`<svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 21.4 38.3"><path d="M18.6,42.6,1.05,25.05a1.524,1.524,0,0,1-.35-.5,1.562,1.562,0,0,1,0-1.1,1.524,1.524,0,0,1,.35-.5L18.6,5.4a2.057,2.057,0,0,1,2.8,0,1.992,1.992,0,0,1,0,2.85L5.65,24,21.4,39.75a1.861,1.861,0,0,1,.575,1.425,2.006,2.006,0,0,1-2,1.975A1.866,1.866,0,0,1,18.6,42.6Z" transform="translate(-0.6 -4.85)"/></svg>`, `<svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 21.4 38.3"><path d="M4,42.6,21.55,25.05a1.524,1.524,0,0,0,.35-.5,1.562,1.562,0,0,0,0-1.1,1.524,1.524,0,0,0-.35-.5L4,5.4a1.9,1.9,0,0,0-1.4-.55,1.9,1.9,0,0,0-1.4.55,1.992,1.992,0,0,0,0,2.85L16.95,24,1.2,39.75a1.861,1.861,0,0,0-.575,1.425A1.954,1.954,0,0,0,1.2,42.55a1.947,1.947,0,0,0,1.425.6A1.866,1.866,0,0,0,4,42.6Z" transform="translate(-0.6 -4.85)"/></svg>`],
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:3
            },
            1200:{
                items:4
            },
            1500:{
                items:5
            }
        }
    })
    // ===========================================
    $('.owl-sites .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        autoplay: true,
        navText: [`<svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 21.4 38.3"><path d="M18.6,42.6,1.05,25.05a1.524,1.524,0,0,1-.35-.5,1.562,1.562,0,0,1,0-1.1,1.524,1.524,0,0,1,.35-.5L18.6,5.4a2.057,2.057,0,0,1,2.8,0,1.992,1.992,0,0,1,0,2.85L5.65,24,21.4,39.75a1.861,1.861,0,0,1,.575,1.425,2.006,2.006,0,0,1-2,1.975A1.866,1.866,0,0,1,18.6,42.6Z" transform="translate(-0.6 -4.85)"/></svg>`, `<svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 21.4 38.3"><path d="M4,42.6,21.55,25.05a1.524,1.524,0,0,0,.35-.5,1.562,1.562,0,0,0,0-1.1,1.524,1.524,0,0,0-.35-.5L4,5.4a1.9,1.9,0,0,0-1.4-.55,1.9,1.9,0,0,0-1.4.55,1.992,1.992,0,0,0,0,2.85L16.95,24,1.2,39.75a1.861,1.861,0,0,0-.575,1.425A1.954,1.954,0,0,0,1.2,42.55a1.947,1.947,0,0,0,1.425.6A1.866,1.866,0,0,0,4,42.6Z" transform="translate(-0.6 -4.85)"/></svg>`],
        responsive:{
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:3
            },
            1400:{
                items:4
            }
        }
    })
    // ===========================================
    // ===========================================
    // ===========================================
    // ===========================================
    // ===========================================
    // ===========================================
})

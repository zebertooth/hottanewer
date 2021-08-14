
/* Manage Class Funtions https://www.sitepoint.com/add-remove-css-class-vanilla-js/ */
function addClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.add(l)}function removeClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.remove(l)}


/* ------- Responsive ------- */
function isMobile() { 
    return window.matchMedia("only screen and (max-width: 992px)").matches;
}

function openFullScreenNav() {
  document.getElementById("fullScreenNav").style.width = "60%";
  document.getElementById("sideBgNav").style.width = "110px";
}
function closeFullScreenNav() {
  document.getElementById("fullScreenNav").style.width = "0%";
  document.getElementById("sideBgNav").style.width = "0%";
}

/* -------  Mobile Menu:: Dropdown Toggle ------- */
document.addEventListener(
    "click",
    function (event) {
        if (event.target.matches(".site-toggle")) {
            if (event.target.classList.contains("active")) {
                removeClass(".site-toggle, .site-nav-m", "active");
                removeClass("body", "show-nav");
            } else {
                addClass(".site-toggle, .site-nav-m", "active");
                addClass("body", "show-nav");
            }
        }

        if (event.target.parentNode.matches("#site-nav-m .nav-item-has-children")) {
            if(event.target.getAttribute("href") === '#') { 
                document.querySelectorAll('#site-nav-m .menu .nav-item-has-children').forEach((e) => {
                    if(e !== event.target.parentNode) { 
                        e.classList.remove("active");
                    }
                });
                if (event.target.parentNode.classList.contains("active")) {
                    event.target.parentNode.classList.remove("active");
                } else {
                    event.target.parentNode.classList.add("active");
                }
            }
        }
        // Click on Arrow
        if (event.target.matches("#site-nav-m .nav-item-has-children > svg")) {
            document.querySelectorAll('#site-nav-m .menu .nav-item-has-children').forEach((e) => {
                if(e !== event.target.parentNode) { 
                    e.classList.remove("active");
                }
            });
            if (event.target.parentNode.classList.contains("active")) {
                event.target.parentNode.classList.remove("active");
            } else {
                event.target.parentNode.classList.add("active");
            }
        }
    },
    false
);
/* -------  Mobile Menu:: Add Icon Dropdown Toggle ------- */
document
    .querySelectorAll("#site-nav-m .nav-item-has-children")
    .forEach((e) => {
        e.insertAdjacentHTML(
        "beforeend",
        '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 20 20"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16"><path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>'
        );
    }
);

/* --- LOTTIE ANIMATION RENDER --- */
/*------- Preloader ------*/
$(window).on('load', function() {
    lottie.loadAnimation({
        container: document.getElementById("loading-logo"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: `./img/animation/loading-logo.json`
    });
    $('.preloader').delay(2500).fadeOut('slow');
    // Arrow-Down
    lottie.loadAnimation({
        container: document.getElementById("arrow-down"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: `./img/animation/arrow-down.json`
    });
    // Arrow-To-Left
    lottie.loadAnimation({
        container: document.getElementById("arrow-left"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: `./img/animation/arrow-right.json`
    });
    // Arrow-To-Right
    lottie.loadAnimation({
        container: document.getElementById("arrow-right"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: `./img/animation/arrow-left.json`
    });
    // Vitamin
    lottie.loadAnimation({
        container: document.getElementById("vitamin"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: `./img/animation/vitamins.json`
    });
});

/* --- Modal --- */
$('#siteVideo').on('shown.bs.modal', function () { 
    if($("#siteVideo iframe").length) { 
        $("#siteVideo iframe")[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
    }else if( $("#siteVideo video").length ) { 
        $('#siteVideo video').trigger('play');
    }
});

$("#siteVideo").on('hidden.bs.modal', function (e) {
    if($("#siteVideo iframe").length) {
        $("#siteVideo iframe")[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
    }else if( $("#siteVideo video").length ) { 
        $('#siteVideo video').trigger('pause');
    }
});

/*------- Banner ------*/
// Desktop
var homepageBanner = new Swiper( ".swiper-homepage" , {
    loop: true,
    autoplay: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }
});
var brandCarousel = new Swiper(".swiper-brand", {
    spaceBetween: 15,
    slidesPerView: 3,
    slidesPerColumn: 2,
    slidesPerColumnFill: "row",
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
        // Desktop
        768: {
            slidesPerView: 6,
            spaceBetween: 30,
            slidesPerColumn: 1,
            loop: true,
            centeredSlides: true,
        }
    }
});
var trendBlogCarousel = new Swiper(".swiper-trend-blog", {
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: false,
    grabCursor: true,
    keyboard: {
      enabled: true,
    },
    scrollbar: {
      el: ".swiper-scrollbar",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // Desktop
        769: {
            slidesPerView: 4,
        }
    }
});

var trendHeroCarousel = new Swiper(".swiper-blog-hero", {
    slidesPerView: 1,
    spaceBetween: 0,
    centeredSlides: false,
    grabCursor: false,
    loop: false,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    }
});

var relateBlogCarousel = new Swiper(".swiper-relate-content", {
    slidesPerView: 1.1,
    spaceBetween: 20,
    centeredSlides: false,
    allowTouchMove: true,
    breakpoints: {
        // Desktop
        769: {
            slidesPerView: 4,
            spaceBetween: 20,
            centeredSlides: false,
            allowTouchMove: false,
        }
    }
});

// var productCarousel = new Swiper(".swiper-product", {
//     slidesPerView: 1,
//     centeredSlides: false,
//     grabCursor: false,
//     simulateTouch: false,
//     loop: false,
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     }
// });


var hotDrinkCarousel = new Swiper(".swiper-hot-drink", {
    slidesPerView: 1,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});

var coldDrinkCarousel = new Swiper(".swiper-cold-drink", {
    slidesPerView: 1,
    loop: true,
    observer: true,
    observeParents: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});


// Slick
var igSlider = $('.slick-center').slick({
    centerMode: true,
    slidesToShow: 5,
    dots: false,
    arrows: true,
    swipe: false,
    swipeToSlide: false,
    variableWidth: true,
    variableHeight: true,
    prevArrow:"<button type='button' class='slick-arrow-custom slick-prev-custom'><i class='bi bi-chevron-left'></i></button>",
    nextArrow:"<button type='button' class='slick-arrow-custom slick-next-custom'><i class='bi bi-chevron-right'></i></button>",
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                centerMode: true,
                centerPadding: '30px',
                dots: false,
                arrows: false,
                swipe: true,
                swipeToSlide: true,
                variableWidth: false,
                variableHeight: false,
            }
        }
    ]
});

$('.slide').click('click', function(e){   
    e.preventDefault();
    var currentSlide = $(e.currentTarget).data('slick-index');
    igSlider.slick( 'slickGoTo', parseInt(currentSlide) );
});

// Event after slide change
$('.slick-center').on('afterChange', function(event, slick, currentSlide, nextSlide){
    showIgCaption($('.slick-current').data('caption'));
});

// Run Initial Caption.
showIgCaption($('.slick-current').data('caption'));
function showIgCaption(caption) { 
    $("#ig_caption").html(caption);
}

$('.-video').click(function(){ 
    var isCurrent = $(this).parent('.slick-current').length;
    if(isCurrent) { 
        var isPlaying = $(this).hasClass('-playing');
        $(this).toggleClass('-playing');
        if(!isPlaying) { 
            $(this).find('.video-ig').trigger('play'); // play
        }else {
            $(this).find('.video-ig').trigger('pause'); // pause
        }
    }
});

// Mobile
if(isMobile()) { 
    var iamMobileCarousel = new Swiper( ".swiper-iam-mobile" , {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        }
    });
    var reasonMobileCarousel = new Swiper( ".swiper-reason-mobile");
    var iamMobileCarousel = new Swiper( ".swiper-feature-product" , {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        }
    });
}

/*------- Animated ------*/
new WOW().init();

/* -------  Sticky Menu ------- */
var sticky = {
    toggle: function() {
        var buttonText = $('#toggle_text');
        if($("#stickyMenu").hasClass('-hide')) { 
            $(buttonText).html(`ซ่อน <i class="bi bi-chevron-down"></i>`)
        }else { 
            $(buttonText).html(`แสดง <i class="bi bi-chevron-up"></i>`)
        }
        $("#stickyMenu").toggleClass('-hide');
    },
    toTop: function() { 
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; 
    }
}
var stickyOffset = isMobile() ? 268 : 90; // 268 Footer height when mobile, 90 when desktop
window.addEventListener("scroll", function () {
    var docHeight = $(document).height();
	var currentPosition = window.innerHeight + $(window).scrollTop();
    var sticky = $("#stickyMenu");
    if((docHeight - stickyOffset) <= currentPosition) {
        sticky.css({ bottom: (stickyOffset - (docHeight - currentPosition)) + 30 + "px" });
    }else { 
        sticky.css({ bottom: "30px"});
    }
}, false);

/* -------  Sticky CUP ------- */
if (document.querySelector('.about-us')) {
    window.addEventListener("scroll", function () {
        var docHeight = $(document).height();
        var currentPosition = $(window).height() + $(window).scrollTop();
        var screenHeight =  $(window).height();
        var perfectHeight = 698; 
        if(docHeight == currentPosition && screenHeight > 800) {
            var marginTop =  (screenHeight - perfectHeight) - 90;
            console.log(marginTop);
            $('#pin1').css({marginTop: marginTop + "px"})
        }else { 
            $('#pin1').css({marginTop: "auto"})
        }
    }, false);
}

/* ------- Social Icons ------- */
var url = window.location.href.split("?")[0];
document
    .querySelectorAll(".social-share-icon")
    .forEach((e) => {
        var socials = `
          <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}" target="_blank">
            <img src="./img/icon-facebook-white.svg" alt="icon-share-facebook" />
          </a>
          <a href="https://social-plugins.line.me/lineit/share?url=${encodeURIComponent(url)}" target="_blank">
            <img src="./img/icon-twitter-white.svg" alt="icon-share-line" />
          </a>
            <a href="https://twitter.com/share?url=${encodeURIComponent(url)}" target="_blank">
            <img src="./img/icon-line-white.svg" alt="icon-share-twitter" />
            </a>
          `;
        e.insertAdjacentHTML( 'beforeend', socials );
    }
);


/* ------- Tabs ------- */
$('.howto-drink--tab[data-toggle="tab"]').on('show.bs.tab', function (e) {
    if(e.target.id == "nav-cold-tab") { 
        console.log(e.target.id);
        $("#product_howto_drink").removeClass('-hot');
        $("#product_howto_drink").addClass('-cold');
    }else { 
        $("#product_howto_drink").removeClass('-cold');
        $("#product_howto_drink").addClass('-hot');
    }
  })



/* ------- CheckBox Show/Hide Product Page ------- */
$('input[type="radio"][name="product-size"]').on('click', function(e) {
    $('.product-image-value').each((idx, value) => {
        $(value).hide();

        var imageValue = $(value).data("image-value");
        if( imageValue ==  e.target.value) {
            $(value).fadeIn(300) 
        }
    });
});
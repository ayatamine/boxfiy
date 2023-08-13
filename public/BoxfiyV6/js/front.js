//start animation home page

let onehome = document.getElementById("one-home");
let twohome = document.getElementById("two-home");
let threehome = document.getElementById("three-home");
let fourhome = document.getElementById("four-home");
let fivehome = document.getElementById("five-home");


window.addEventListener("scroll",function(){
    if(window.scrollY >= onehome.offsetTop-500)
    {
        onehome.style="opacity:1";
    }

    if(window.scrollY >= twohome.offsetTop-500)
    {
        twohome.style="opacity:1";
    }

    if(window.scrollY >= threehome.offsetTop-500)
    {
        threehome.style="opacity:1";
    }

    if(window.scrollY >= fourhome.offsetTop-500)
    {
        fourhome.style="opacity:1";
    }

    if(window.scrollY >= fivehome.offsetTop-500)
    {
        fivehome.style="opacity:1";
    }
})


//end animation home page




let emailHome = document.querySelector(".email-home");
let passHome = document.querySelector(".password-home");
let pay1 = document.getElementById("pay1");
let pay2 = document.getElementById("pay2");
let pay3 = document.getElementById("pay3");
let pay4 = document.getElementById("pay4");
let pay5 = document.getElementById("pay5");
let pay6 = document.getElementById("pay6");

window.addEventListener("load",function(){
    if(window.innerWidth > 767)
    {
    pay1.style = "opacity: 1;transform: translateX(0px);";
    pay2.style = "opacity: 1;transform: translateX(0px);";
    pay3.style = "opacity: 1;transform: translateX(0px);";
    pay4.style = "opacity: 1;transform: translateX(0px);";
    pay5.style = "opacity: 1;transform: translateX(0px);";
    pay6.style = "opacity: 1;transform: translateX(0px);";
    }

    else if(window.innerWidth <= 767)
    {
        pay1.style = "opacity: 1;transform: translateX(0px);";
        pay2.style = "opacity: 1;transform: translateX(0px);";
        pay3.style = "opacity: 1;transform: translateX(0px);";
    }
})

let inputSignPage =document.getElementById("input-sign-page");
let inputPassSignPage =document.getElementById("input-pass-sign-page");

window.addEventListener("scroll",function(){
    if(window.scrollY >= inputSignPage.offsetTop-500)
    {
        inputSignPage.style="opacity:1; transform: translateX(0px);";
    }

    if(window.scrollY >= inputPassSignPage.offsetTop-500)
    {
        inputPassSignPage.style="opacity:1; transform: translateX(0px);";
    }

})


window.addEventListener("load",function(){
    if(window.innerWidth >= 954)
    {
        inputSignPage.style = "opacity: 1;transform:translateX(0px);";
        inputPassSignPage.style = "opacity: 1;transform:translateX(0px);";


    }

})






window.addEventListener("scroll",function(){

    
    if(window.scrollY >= pay4.offsetTop-50)
    {
        pay4.style="opacity:1; transform: translateX(0px);";
    }

    if(window.scrollY >= pay5.offsetTop-50)
    {
        pay5.style="opacity:1; transform: translateX(0px);";
    }

    if(window.scrollY >= pay6.offsetTop-50)
    {
        pay6.style="opacity:1; transform: translateX(0px);";
    }

})


window.addEventListener("scroll",function(){

    
    if(window.scrollY >= emailHome.offsetTop-350)
    {
        emailHome.style="opacity:1; transform: translateX(0px);";
    }

    if(window.scrollY >= passHome.offsetTop-350)
    {
        passHome.style="opacity:1; transform: translateX(0px);";
    }

})

window.addEventListener("load",function(){
    if(window.innerWidth >= 950)
    {
        emailHome.style="opacity:1; transform: translateX(0px);";
        passHome.style="opacity:1; transform: translateX(0px);";
    }
})






$(document).ready(function() {

    $('.socials-content').slick({
        dots: false,
        infinite: false,
        speed: 300,
        centerMode: false,
        slidesToShow: 1,
        variableWidth: false,
        responsive: [

            {
                breakpoint: 1280,
                settings: {
                    arrows: true,
                    slidesToShow: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    slidesToShow: 2
                }
            }
        ]
    });


    $(".show-notification").click(function() {
        $(".notifications-container").fadeToggle(400);
    })

    $(".close-notifications").click(function() {
        $(".notifications-container").slideUp(400);
    })

    $(".social-left-arrow").click(function() {
        $(".socials-content .slick-prev").click();
    })

    $(".social-right-arrow").click(function() {
        $(".socials-content .slick-next").click();
    })



    $(".open-mobile-nav").click(function() {
        $(".mobile-nav").slideDown(400);
    })

    $(".close-nav").click(function() {
        $(".mobile-nav").slideUp(400);
    })

    $(".mobile-nav ul li").click(function() {
        $(".mobile-nav").slideUp(400);
    })



    if ($(".range-details").length) {
        $(".more-details").click(function() {
            $(this).children("span").fadeToggle(400);
            $(this).parent().parent().parent().next().slideToggle(400);
        })
        $(".service .service-info").click(function() {
            $(this).parent().children(".details").children(".price").children(".more-details").children("span").fadeToggle(400);
            $(this).parent().next().slideToggle(400);
        })
        const rangeInputs = document.querySelectorAll('input[type="range"]')
        const numberInput = document.querySelector('input[type="number"]')

        function handleInputChange(e) {
            let target = e.target
            if (e.target.type !== 'range') {
                target = document.getElementById('range')
            }
            const min = target.min
            const max = target.max
            const val = target.value

            target.style.backgroundSize = (val - min) * 100 / (max - min) + '% 100%'
        }

        rangeInputs.forEach(input => {
            input.addEventListener('input', handleInputChange)
        })

        numberInput.addEventListener('input', handleInputChange)


    }



    if ($(".payment-slider").length) {

        $('.payment-slider').slick({
            dots: false,
            infinite: true,
            arrows: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $(".payment-slider-left").click(function() {
            $(".payment-slider .slick-prev").click();
        })


        $(".payment-slider-right").click(function() {
            $(".payment-slider .slick-next").click();
        })
    }

    if ($(".about-slider").length) {

        $('.about-slider').slick({
            dots: false,
            infinite: true,
            arrows: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $(".about-slider-left").click(function() {
            $(".about-slider .slick-prev").click();
        })


        $(".about-slider-right").click(function() {
            $(".about-slider .slick-next").click();
        })
    }


    if ($(".rate-slider").length) {

        $('.rate-slider').slick({
            dots: false,
            infinite: true,
            arrows: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $(".rate-slider-left").click(function() {
            $(".rate-slider .slick-prev").click();
        })

        $(".rate-slider-right").click(function() {
            $(".rate-slider .slick-next").click();
        })
    }

    if ($(".add-funds").length) {
        $(".add-funds .funds-content .pay-ways ul label").click(function() {
            $(".add-funds .funds-content .pay-ways ul label").removeClass("active");
            $(this).addClass("active");
        })



        $(".incrementer .minus-btn").click(function() {
            increvalueint = parseInt($(".incrementer input").val());
            $(".incrementer input").val(increvalueint - 1 )
        })

        $(".incrementer .plus-btn").click(function() {
            increvalueint = parseInt($(".incrementer input").val());
            $(".incrementer input").val(increvalueint + 1)
        })

    }




});
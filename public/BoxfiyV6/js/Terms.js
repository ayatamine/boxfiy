let one =document.querySelector(".one");
let two =document.querySelector(".two");
let three =document.querySelector(".three");
let four =document.querySelector(".four");
let five =document.querySelector(".five");
let six =document.querySelector(".six");



window.addEventListener("load",function(){
    one.style.opacity = "1";
    two.style.opacity = "1";

})

window.addEventListener("scroll",function(){
    if(window.scrollY >= three.offsetTop-350)
    {
        three.style = " opacity: 1;";
    }

    if(window.scrollY >= four.offsetTop-350)
    {
        four.style = " opacity: 1;";
    }

    if(window.scrollY >= five.offsetTop-350)
    {
        five.style = " opacity: 1;";
    }

    if(window.scrollY >= six.offsetTop-350)
    {
        six.style = " opacity: 1;";
    }


})
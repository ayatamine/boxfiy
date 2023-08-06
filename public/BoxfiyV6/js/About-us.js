
let one =document.getElementById("one");
let two =document.getElementById("two");
let three =document.getElementById("three");
let four =document.getElementById("four");
let five =document.getElementById("five");
let six =document.getElementById("six");

window.addEventListener("load",function(){
    one.style="opacity:1;  transform: translateY(0px);";
    two.style="opacity:1;  transform: translateY(0px);";
    three.style="opacity:1;  transform: translateY(0px);";
});


window.addEventListener("scroll",function(){
    if(window.scrollY >= four.offsetTop-350)
    {
        four.style="opacity:1;  transform: translateY(0px);";
    }

    if(window.scrollY >= five.offsetTop-350)
    {
        five.style="opacity:1;  transform: translateY(0px);";
    }

    if(window.scrollY >= six.offsetTop-500)
    {
        six.style="opacity:1;  transform: translateY(0px);";
    }
})
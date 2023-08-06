let listone = document.getElementById("listone");
let listT =document.getElementById("list2");
let selectionbtn =document.querySelector(".selection-btn");
let currencybtn = document.querySelector(".currency-btn");
let code = document.getElementById("code");

selectionbtn.addEventListener("click",function(){
if (listone.style.opacity==0)
listone.style = "opacity:1;transform: translateY(5px);";
else if (listone.style.opacity!==0)
listone.style = "opacity:0;transform: translateY(-10px);";
})


currencybtn.addEventListener("click",function(){

    if (listT.style.opacity==0)
    listT.style = "opacity:1;transform: translateY(5px);";
    else if (listT.style.opacity!==0)
    listT.style = "opacity:0;transform: translateY(-10px);";
})


function copy(){
    navigator.clipboard.writeText
                (code.textContent);
}


